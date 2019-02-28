<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\bazaar;
use App\stall;
use App\account;
use App\billing;
use App\reservation;
use App\notificationmessages;
use App\Notifications\notifyCancelBazaarCalamities;
use App\stallsarchive;
use Validator;
use Response;
use Session;


class BazaarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     protected $rules =
     [
       'BazaarName' => 'required|max:255',
       'BazaarStartDate' => 'required|after:today',
       'BazaarEndDate' => 'required|after:BazaarStartDate',
       'BazaarStartTime' => 'required',
       'BazaarEndTime' => 'required',
       'BazaarVenue' => 'required',
       'BazaarStatus' => 'required',
     ];

    public function index()
    {
      $SucessAlert = "No Bazaar Created";
      $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();
      $bazaars = bazaar::where('Bazaar_Status','=','Available')->orderBy('PK_BazaarID','DESC')->get();
      return view('navigation/admin/bazaar', ['bazaars' => $bazaars,  'currentAccount' => $currentAccount, 'SucessAlert'=>$SucessAlert]);
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
          'Bazaar_EventPoster' => 'required|mimes:jpeg,png,bmp,tiff',
          'Bazaar_Name' => 'required|max:255',
          'Bazaar_Venue' => 'required',
          'Bazaar_DateEnd' => 'required|after:Bazaar_DateStart',
          'Bazaar_DateStart' => 'required|after:today',
          'Bazaar_TimeStart' => 'required',
          'Bazaar_TimeEnd' => 'required',
          'Bazaar_Description' => 'required',
        ]);
        $bazaars = bazaar::where('Bazaar_Status','=','Available')->get();
        foreach($bazaars as $bazaar){
          if(($request->Bazaar_DateStart == $bazaar->Bazaar_DateStart) && ($request->Bazaar_Venue == $bazaar->Bazaar_Venue)){
            return redirect('/admin/bazaar')->with('status','This Bazaar cannot be added another bazaar with a same time and venue has been found');
          }
        }

        $bazaar = new bazaar();

        $fileName = md5(rand());
        $fileName = $fileName.".jpg"; // generates file name
        $target= "eventposter/";
        $fileTarget = $target.$fileName;
        $tempFileName = $_FILES['Bazaar_EventPoster']['tmp_name'];
        $result= move_uploaded_file($tempFileName,$fileTarget);
        $bazaar->Bazaar_EventPoster = $fileTarget;
        $bazaar->Bazaar_Name = $request->Bazaar_Name;
        $bazaar->Bazaar_Venue = $request->Bazaar_Venue;
        $bazaar->Bazaar_DateStart = $request->Bazaar_DateStart;
        $bazaar->Bazaar_DateEnd = $request->Bazaar_DateEnd;
        $bazaar->Bazaar_TimeStart = $request->Bazaar_TimeStart;
        $bazaar->Bazaar_TimeEnd = $request->Bazaar_TimeEnd;
        $bazaar->Bazaar_Status = "Available";
        $bazaar->Bazaar_Description = $request->Bazaar_Description;
        $bazaar->save();
        //    $path = $request->file('avatar')->store('avatars'); $file = $request->photo  $file = $request->file('imgUpload1')->store('images');

      if($bazaar->Bazaar_Venue == "MegatradeHall"){
        $cornerStall = 0;
        for($cornerStall = 0;$cornerStall<8;$cornerStall++){
          $stall = new stall;
          $stall->Stall_Type = 'Corner';
          $stall->Stall_Size = '2x3 m';
          $stall->Stall_Status = 'Available';
          $stall->FK_BazaarID = $bazaar->PK_BazaarID;
          $stall->Stall_RentalCost = 17000.00;
          $stall->Stall_BookingCost = 5000.00;
          $stall->save();
        }

        $regularStall = 0;
        for($regularStall = 0;$regularStall<24;$regularStall++){
          $stall = new stall;
          $stall->Stall_Type = 'Regular';
          $stall->Stall_Size = '2x3 m';
          $stall->Stall_Status = 'Available';
          $stall->FK_BazaarID = $bazaar->PK_BazaarID;
          $stall->Stall_RentalCost = 16000.00;
          $stall->Stall_BookingCost = 5000.00;
          $stall->save();
        }


        $primeStall = 0;
        for($primeStall = 0;$primeStall<11;$primeStall++){
          $stall = new stall;
          $stall->Stall_Type = 'Prime';
          $stall->Stall_Size = '2x3 m';
          $stall->Stall_Status = 'Available';
          $stall->Stall_RentalCost = 18000.00;
          $stall->Stall_BookingCost = 5000.00;
          $stall->FK_BazaarID = $bazaar->PK_BazaarID;
          $stall->save();
        }

        $foodStall = 0;
        for($foodStall = 0;$foodStall<4;$foodStall++){
          $stall = new stall;
          $stall->Stall_Type = 'Food';
          $stall->Stall_Size = '2x3 m';
          $stall->Stall_Status = 'Available';
          $stall->FK_BazaarID = $bazaar->PK_BazaarID;
          $stall->Stall_RentalCost = 17500.00;
          $stall->Stall_BookingCost = 5000.00;
          $stall->save();
        }


        for($primeStall1 = $primeStall;$primeStall1<14;$primeStall1++){
          $stall = new stall;
          $stall->Stall_Type = 'Prime';
          $stall->Stall_Size = '2x3 m';
          $stall->Stall_Status = 'Available';
          $stall->Stall_RentalCost = 18000.00;
          $stall->Stall_BookingCost = 5000.00;
          $stall->FK_BazaarID = $bazaar->PK_BazaarID;
          $stall->save();
        }

      }
      else if($bazaar->Bazaar_Venue =="WorldTradeCenter"){
         for($x = 0;$x<=13;$x++){
             $stall = new stall;
             $stall->Stall_Type = 'Corner';
             $stall->Stall_Size = '2x3 m';
             $stall->Stall_Status = 'Available';
             $stall->FK_BazaarID = $bazaar->PK_BazaarID;
             $stall->Stall_RentalCost = 17000.00;
             $stall->Stall_BookingCost = 5000.00;
             $stall->save();
         }

         for($y=0;$y<=1;$y++){
           for($x=0;$x<=13;$x++){
               $stall = new stall;
               $stall->Stall_Type = 'Regular';
               $stall->Stall_Size = '2x3 m';
               $stall->Stall_Status = 'Available';
               $stall->FK_BazaarID = $bazaar->PK_BazaarID;
               $stall->Stall_RentalCost = 17000.00;
               $stall->Stall_BookingCost = 5000.00;
               $stall->save();
           }
         }

         for($x=0;$x<=13;$x++){
            if($x==0){
              $stall = new stall;
              $stall->Stall_Type = 'Regular';
              $stall->Stall_Size = '2x3 m';
              $stall->Stall_Status = 'Available';
              $stall->FK_BazaarID = $bazaar->PK_BazaarID;
              $stall->Stall_RentalCost = 17000.00;
              $stall->Stall_BookingCost = 5000.00;
              $stall->save();
            }
            else if($x==13){
              $stall = new stall;
              $stall->Stall_Type = 'Regular';
              $stall->Stall_Size = '2x3 m';
              $stall->Stall_Status = 'Available';
              $stall->FK_BazaarID = $bazaar->PK_BazaarID;
              $stall->Stall_RentalCost = 17000.00;
              $stall->Stall_BookingCost = 5000.00;
              $stall->save();
            }
            else{
              $stall = new stall;
              $stall->Stall_Type = 'Corner';
              $stall->Stall_Size = '2x3 m';
              $stall->Stall_Status = 'Available';
              $stall->FK_BazaarID = $bazaar->PK_BazaarID;
              $stall->Stall_RentalCost = 17000.00;
              $stall->Stall_BookingCost = 5000.00;
              $stall->save();
            }
         }

        for($x=0;$x<=1;$x++){
          $stall = new stall;
          $stall->Stall_Type = 'Regular';
          $stall->Stall_Size = '2x3 m';
          $stall->Stall_Status = 'Available';
          $stall->FK_BazaarID = $bazaar->PK_BazaarID;
          $stall->Stall_RentalCost = 17000.00;
          $stall->Stall_BookingCost = 5000.00;
          $stall->save();
        }

        for($x=0;$x<=13;$x++){
           if($x==0){
             $stall = new stall;
             $stall->Stall_Type = 'Regular';
             $stall->Stall_Size = '2x3 m';
             $stall->Stall_Status = 'Available';
             $stall->FK_BazaarID = $bazaar->PK_BazaarID;
             $stall->Stall_RentalCost = 17000.00;
             $stall->Stall_BookingCost = 5000.00;
             $stall->save();
           }
           else if($x==13){
             $stall = new stall;
             $stall->Stall_Type = 'Regular';
             $stall->Stall_Size = '2x3 m';
             $stall->Stall_Status = 'Available';
             $stall->FK_BazaarID = $bazaar->PK_BazaarID;
             $stall->Stall_RentalCost = 17000.00;
             $stall->Stall_BookingCost = 5000.00;
             $stall->save();
           }
           else{
             $stall = new stall;
             $stall->Stall_Type = 'Corner';
             $stall->Stall_Size = '2x3 m';
             $stall->Stall_Status = 'Available';
             $stall->FK_BazaarID = $bazaar->PK_BazaarID;
             $stall->Stall_RentalCost = 17000.00;
             $stall->Stall_BookingCost = 5000.00;
             $stall->save();
           }
        }

        for($y=0;$y<=1;$y++){
          for($x=0;$x<=13;$x++){
              $stall = new stall;
              $stall->Stall_Type = 'Regular';
              $stall->Stall_Size = '2x3 m';
              $stall->Stall_Status = 'Available';
              $stall->FK_BazaarID = $bazaar->PK_BazaarID;
              $stall->Stall_RentalCost = 17000.00;
              $stall->Stall_BookingCost = 5000.00;
              $stall->save();
          }
        }

        for($x=0;$x<=13;$x++){
            $stall = new stall;
            $stall->Stall_Type = 'Prime';
            $stall->Stall_Size = '2x3 m';
            $stall->Stall_Status = 'Available';
            $stall->FK_BazaarID = $bazaar->PK_BazaarID;
            $stall->Stall_RentalCost = 17000.00;
            $stall->Stall_BookingCost = 5000.00;
            $stall->save();
        }

        for($x=0;$x<=3;$x++){
            $stall = new stall;
            $stall->Stall_Type = 'Prime';
            $stall->Stall_Size = '2x3 m';
            $stall->Stall_Status = 'Available';
            $stall->FK_BazaarID = $bazaar->PK_BazaarID;
            $stall->Stall_RentalCost = 17000.00;
            $stall->Stall_BookingCost = 5000.00;
            $stall->save();
        }

        for($x=0;$x<=4;$x++){
            $stall = new stall;
            $stall->Stall_Type = 'Food';
            $stall->Stall_Size = '2x3 m';
            $stall->Stall_Status = 'Available';
            $stall->FK_BazaarID = $bazaar->PK_BazaarID;
            $stall->Stall_RentalCost = 17000.00;
            $stall->Stall_BookingCost = 5000.00;
            $stall->save();
        }

        for($x=0;$x<=3;$x++){
            $stall = new stall;
            $stall->Stall_Type = 'Prime';
            $stall->Stall_Size = '2x3 m';
            $stall->Stall_Status = 'Available';
            $stall->FK_BazaarID = $bazaar->PK_BazaarID;
            $stall->Stall_RentalCost = 17000.00;
            $stall->Stall_BookingCost = 5000.00;
            $stall->save();
        }

        for($x=0;$x<=4;$x++){
            $stall = new stall;
            $stall->Stall_Type = 'Food';
            $stall->Stall_Size = '2x3 m';
            $stall->Stall_Status = 'Available';
            $stall->FK_BazaarID = $bazaar->PK_BazaarID;
            $stall->Stall_RentalCost = 17000.00;
            $stall->Stall_BookingCost = 5000.00;
            $stall->save();
        }

        for($x=0;$x<=3;$x++){
            $stall = new stall;
            $stall->Stall_Type = 'Prime';
            $stall->Stall_Size = '2x3 m';
            $stall->Stall_Status = 'Available';
            $stall->FK_BazaarID = $bazaar->PK_BazaarID;
            $stall->Stall_RentalCost = 17000.00;
            $stall->Stall_BookingCost = 5000.00;
            $stall->save();
        }
      }
      $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();
      $bazaars = bazaar::where('Bazaar_Status','=','Available')->get();
      $SucessAlert = "Bazaar Created";
      return view('navigation/admin/bazaar', ['bazaars' => $bazaars,'currentAccount'=>$currentAccount,'SucessAlert'=>$SucessAlert]);

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
     * Show the form for editing the specified resource.
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
        //
        $validator = Validator::make(Input::all(), $this->rules);
          if ($validator->fails()) {
              return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
          }
          else{
            $bazaar = bazaar::find($id);
            $bazaar->Bazaar_Name = $request->BazaarName;
            $bazaar->Bazaar_Venue = $request->BazaarVenue;
            $bazaar->Bazaar_DateStart = $request->BazaarStartDate;
            $bazaar->Bazaar_DateEnd = $request->BazaarEndDate;
            $bazaar->Bazaar_TimeStart = $request->BazaarStartTime;
            $bazaar->Bazaar_TimeEnd = $request->BazaarEndTime;
            $bazaar->Bazaar_Status = $request->BazaarStatus;
            $bazaar->Bazaar_Description = $request->BazaarDescription;
            $bazaar->save();
            return response()->json($bazaar);
        }
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
        $bazaar = bazaar::findorfail($id);
        $bazaar->delete();

        return response()->json($bazaar);
    }

    public function cancelBazaar(Request $request, $id){
      if($request->PurposeOfDelete == "Calamaties"){
        $bazaar = bazaar::findorfail($id);
        $stallsWithReservation = $bazaar->stalls()->where('FK_ReservationID', '!=', 'null')->get();


        foreach($stallsWithReservation as $stallWithReservation){
          $ReservationandBillID = $stallWithReservation->FK_ReservationID;
          $billing = billing::find($ReservationandBillID);

          $reservation = reservation::find($ReservationandBillID);

          //the following stalls will be archived
          $stallArchived = new stallsarchive();
          $stallArchived->FK_BillingID = $billing->PK_BillingID;
          $stallArchived->FK_StallID = $stallWithReservation->PK_StallID;
          $stallArchived->save();

          if($billing->Billing_Status != "Void"){
            $accountToBeRefunded = account::find($billing->FK_AccountID);
          $accountToBeRefunded->notify(new notifyCancelBazaarCalamities($billing));
          $CashToBePaid = $billing->Billing_AmountToBePaid;

          $accountToBeRefunded->Account_Balance -= $CashToBePaid; //the cash for refund will be refunded to their current cash
          $accountToBeRefunded->save(); // the cash will now be refunded
          $billing->Billing_Status = "Void";
          }


            $billing->save();

            foreach ($billing->paymentsMade as $payment) {
               if($payment->Payment_Status == "Pending for Approval"){
                 $payment->Payment_Status = "Not Approved";
                 $payment->save();
               }
            }
        }

        $bazaar->Bazaar_Status = "Not Available";
        $bazaar->save();
        return response()->json($bazaar);

      }
      else if($request->PurposeOfDelete == "Other"){
        $bazaar = bazaar::findorfail($id);
        $CashPaidforRefund = billing::where('Billing_Status','<>','Void')->sum('Billing_AmountPaid');
        $stallsWithReservation = $bazaar->stalls()->where('FK_ReservationID', '!=', 'null')->get();
        foreach($stallsWithReservation as $stallWithReservation){
          $ReservationandBillID = $stallWithReservation->FK_ReservationID;
          $billing = billing::find($ReservationandBillID);


          //the following stalls will be archived
          $stallArchived = new stallsarchive();
          $stallArchived->FK_BillingID = $billing->PK_BillingID;
          $stallArchived->FK_StallID = $stallWithReservation->PK_StallID;
          $stallArchived->save();

          if($billing->Billing_Status != "Void"){
              $accountToBeRefunded = account::find($billing->FK_AccountID);
              $accountToBeRefunded ->notify(new notifyCancelBazaarCalamities($billing));
              $CashPaidforRefund = $billing->Billing_AmountPaid;
                if($billing->Billing_BalanceFromPreviousBilling < 0){
                  $CashPaidforRefund-=$billing->Billing_BalanceFromPreviousBilling;
                }
              // the cash will now be refunded
             $CashToBePaid = $billing->Billing_AmountToBePaid;

             $accountToBeRefunded->Account_Balance -= $CashToBePaid; //the cash for refund will be refunded to their current cash
             $accountToBeRefunded->Account_Balance -= $CashPaidforRefund;
             $accountToBeRefunded->save();
             $billing->Billing_Status = "Void";


          }

          $reservation = reservation::find($ReservationandBillID);

          $billing->save();
        }
        $bazaar->Bazaar_Status = "Not Available";
        $bazaar->save();
        return response()->json($bazaar);
      }
      else{

      }
    }

    public function search()
    {

    }
}
