<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment;
use App\billing;
use Session;
use DB;


class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $payments = payment::where('Payment_Status','Pending for Approval')->get();
            return view('navigation/admin/collection',['payments' => $payments]);
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

        $reservations = DB::table('accounts')
        ->join('reservations','accounts.PK_AccountID', '=', 'reservations.FK_AccountID')
        ->join('billings','reservations.FK_BillingID','=','billings.PK_BillingID')
        ->where('PK_AccountID','=',Session::get('UserAccountID'))
        ->get();
        return view('navigation/brand/reservations', ['reservations' => $reservations]);
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
        echo "Test";

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
        // SIMON TANONG KO LANG, DI KAYA DAPAT ARCHIVE LANG YUNG ACCOUNT PAG DINELETE SAKA YUNG IBANG CRUCIAL DATA, KASI CRUCIAL NGA SILA. BAKA MAMAYA KAILANGANG KAILANGAN IRETRIEVE YUNG DATA KASO PERMANENTLY NA NADELETE. OPINYON KO LANG NAMAN. HAKHAKHAK. DISREGARD MO NA TO KUNG GANUN NA GINAWA M0.
        $payment = payment::find($id);
        $payment->Payment_Amount = $request->PaymentAmount;
        $payment->Payment_Status = "Approved";
        $payment->save();

        $billing = billing::find($payment->FK_BillingID);
        $billing->Billing_AmountPaid = $billing->Billing_AmountPaid + $request->PaymentAmount;
            if($billing->Billing_AmountPaid >= $billing->Billing_NetTotal){
            $billing->Billing_Status = "Paid";
            }
        $billing->save();
        return response()->json($payment);

          }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
