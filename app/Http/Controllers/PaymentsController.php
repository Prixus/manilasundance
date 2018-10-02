<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Thread;
use Carbon\Carbon;
use App\payment;
use App\billing;
use App\reservation;
use App\stall;
use App\account;
use App\notificationmessages;
use App\Notifications\PaymentVerified;
use App\Notifications\PaymentRejected;
use App\Notifications\ExcessPayment;

use Session;
use DB;
use PDF;


class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();
            $payments = payment::where('Payment_Status','Pending for Approval')->get();
            $approvedPayments = payment::where('Payment_Status','Approved')->get();
            return view('navigation/admin/collection',['payments' => $payments,'currentAccount'=>$currentAccount,'approvedPayments' => $approvedPayments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
          'PaymentAmount' => 'required',
          'AccountNumber' => 'required',
          'BillID' => 'required',
          'DepositSlip' => 'required|mimes:jpeg,png,bmp,tiff',

        ]);

        $payments = payment::all();

        foreach ($payments as $payment) {
          if(($request->AccountNumber == $payment->Payment_AccountNumber) && ($payment->Payment_Status =="Approved")){
            return back()->with('status', 'A bank deposit with a same transaction number has already been approved.');
          }
        }


        $ldate = date('Y-m-d H:i:s');

        $payment = new payment();
        $payment->Payment_Amount = $request->PaymentAmount;
        $payment->Payment_Mode = "Deposit";
        $payment->Payment_DateTime = $ldate;
        $payment->Payment_Status = 'Pending for Approval';
        $payment->Payment_AccountNumber = $request->AccountNumber;
        $payment->FK_AccountID = Session::get('UserAccountID');
        $payment->FK_BillingID = $request->BillID;

        $fileName = md5(rand());
        $fileName = $fileName.".jpg"; // generates file name
        $target= "bankReceipt/";
        $fileTarget = $target.$fileName;
        $tempFileName = $_FILES['DepositSlip']['tmp_name'];
        $result= move_uploaded_file($tempFileName,$fileTarget);
        $payment->Payment_ImagePath = $fileTarget;
        $payment->save();

        $currentAccount = account::where('PK_AccountID','=',Session::get('UserAccountID'))->first();

        $reservations = DB::table('accounts')
        ->join('reservations','accounts.PK_AccountID', '=', 'reservations.FK_AccountID')
        ->join('billings','reservations.FK_BillingID','=','billings.PK_BillingID')
        ->where([['PK_AccountID','=',Session::get('UserAccountID')], ['Billing_SubTotal', '>', 0],['Billing_Status','<>','Void']])
        ->get();

        return view('navigation/brand/reservations', ['reservations' => $reservations,'currentAccount'=>$currentAccount,'SucessAlert'=>'Payment has been received and awaiting confirmation']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     *      Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //make a query where you will get the sum amount to be paid and amount paid to get Account_Balance
      $payments = payment::all();

      foreach ($payments as $payment) {
        if(($request->ReferenceNumber == $payment->Payment_AccountNumber) && ($payment->Payment_Status == "Approved")){
        return response()->json("A bank deposit with a same transaction number has already been approved.");
        }
      }

        $ldate = date('Y-m-d H:i:s');
        $payment = payment::find($id);
        $payment->Payment_Amount = $request->PaymentAmount;
        $payment->Payment_Status = "Approved";
        $payment->save();

        $billing = billing::find($request->BillingID);
        $reservation = reservation::where('FK_BillingID', '=', $billing->PK_BillingID)->first();

        $billing->Billing_AmountPaid = $billing->Billing_AmountPaid + $payment->Payment_Amount;
        $account = account::find($payment->FK_AccountID);

        if($payment->Payment_Amount > $billing->Billing_AmountToBePaid){ //checks if the payment amount is greater than amount to be paid
        $account->Account_Balance= $billing->Billing_AmountToBePaid - $payment->Payment_Amount; // computes for the account balance and will return a negative account balance
        $billing->Billing_Status = "Paid";
        $billing->Billing_AmountToBePaid = 0.00; //because payment exceeded amount to be paid the amount to be paid will be 0 and the excess will be deducted to the account balance
          foreach($reservation->stalls as $stall){      //changes the status of all the stalls to be reserved to reserved
            $stall = stall::find($stall->PK_StallID);
            $stall->Stall_Status = "Reserved";
            $stall->save();
          }
        }

        else if($payment->Payment_Amount == $billing->Billing_AmountToBePaid){ //checks if the payment amount is equal to the amount to be paid
          $account->Account_Balance= $billing->Billing_AmountToBePaid - $payment->Payment_Amount; //computes for the account balance. The account balance will be 0
          $account->Account_Balance= 0;
          $billing->Billing_Status = "Paid";
          $billing->Billing_AmountToBePaid = 0.00;
            foreach($reservation->stalls as $stall){
              $stall = stall::find($stall->PK_StallID);
              $stall->Stall_Status = "Reserved";
              $stall->save();
            }
          }

        else{
        if($billing->Billing_AmountPaid >= ($billing->Billing_AmountToBePaid/2)){ //checks if the account balance will be half of the amount to be paid
          $account->Account_Balance= $billing->Billing_AmountToBePaid - $payment->Payment_Amount;
          $billing->Billing_Status = "Half Paid";
          $billing->Billing_AmountToBePaid -= $payment->Payment_Amount;

            foreach($reservation->stalls as $stall){
              $stall = stall::find($stall->PK_StallID);
              $stall->Stall_Status = "TemporarilyReserved";
              $stall->save();
            }
          }
          else{
            $billing->Billing_AmountToBePaid -= $payment->Payment_Amount;
            $account->Account_Balance= $billing->Billing_AmountToBePaid - $payment->Payment_Amount;
            //to be used for partial payment
            foreach($reservation->stalls as $stall){
              $stall = stall::find($stall->PK_StallID);
              $stall->Stall_Status = "TemporarilyReserved";
              $stall->save();
            }
          }
         }
        $billing->save();
        $account->notify(new PaymentVerified($payment));
        $account->save();

        if($account->Account_Balance<0){    //notify if payment exceeded the amount to be paid
          $account->notify(new ExcessPayment($payment));
        }
        return response()->json($payment);

          }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function reject(Request $request,$id){
              $payment = payment::find($id);
              $payment->Payment_Status = "Not Approved";
              $payment->save();

              $account = account::find($payment->FK_AccountID);
              $account->notify(new PaymentRejected($payment));
              return response()->json($payment);
    }
    public function destroy($id)
    {
        //
    }

    public function printReceipt($id){

        $payment = payment::find($id);
        $billing = billing::find($payment->FK_BillingID);
        $reservation = reservation::find($payment->FK_BillingID);


        if($billing->Billing_Status != "Void"){
          $ReservationAccountBrandInformations = DB::table('payments')
            ->join('billings', 'payments.FK_BillingID', '=', 'billings.PK_BillingID')
            ->join('accounts','billings.FK_AccountID', '=', 'accounts.PK_AccountID')
            ->join('guest_brands','accounts.FK_GuestBrandID','=','guest_brands.PK_GuestBrandID')
            ->join('reservations','reservations.FK_BillingID','=','billings.PK_BillingID')
            ->where('PK_PaymentID', '=', $id)
            ->first();


        }
        else{
            $ReservationAccountBrandInformations = DB::table('billings')
            ->join('payments','payments.FK_BillingID','=','billings.PK_BillingID')
            ->join('stallsarchives', 'stallsarchives.FK_BillingID', '=', 'billings.PK_BillingID')
            ->join('stalls', 'stalls.PK_StallID', '=', 'stallsarchives.FK_StallID')
            ->join('reservations', 'reservations.FK_BillingID', '=', 'billings.PK_BillingID')
            ->join('accounts','reservations.FK_AccountID', '=', 'accounts.PK_AccountID')
            ->join('guest_brands','accounts.FK_GuestBrandID','=','guest_brands.PK_GuestBrandID')
            ->where('PK_PaymentID', '=', $id)
            ->first();

            $reservedstalls = DB::table('billings')
            ->join('stallsarchives', 'stallsarchives.FK_BillingID', '=', 'billings.PK_BillingID')
            ->join('stalls', 'stalls.PK_StallID', '=', 'stallsarchives.FK_StallID')
            ->where('PK_BillingID','=',$billing->PK_BillingID)
            ->get();
          }

          $dategenerated = $payment->updated_at;



        $brand = PDF::loadView("pdf/receipt",['ReservedStalls'=> $reservation->stalls, 'ReservationAccountBrandInformations' => $ReservationAccountBrandInformations, 'dategenerated' => $dategenerated]);
        return $brand->download('receipt.pdf');
    }
}
