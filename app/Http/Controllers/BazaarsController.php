<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\bazaar;
use App\stall;
use Validator;
use Response;

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
       'BazaarStartDate' => 'required|after:today|before:BazaarEndDate',
       'BazaarEndDate' => 'required|after:BazaarStartDate',
       'BazaarStartTime' => 'required',
       'BazaarEndTime' => 'required',
       'BazaarVenue' => 'required',
       'BazaarBookingCost' => 'required|min:0',
       'BazaarStatus' => 'required',
     ];

    public function index()
    {
      $bazaars = bazaar::orderBy('PK_BazaarID','DESC')->get();
      return view('navigation/admin/bazaar', ['bazaars' => $bazaars]);
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
          'Bazaar_EventPoster' => 'required'
        ]);

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
        $bazaar->save();
        //    $path = $request->file('avatar')->store('avatars'); $file = $request->photo  $file = $request->file('imgUpload1')->store('images');


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
                $bazaars = bazaar::orderBy('PK_BazaarID','DESC')->get();
                return view('navigation/admin/bazaar', ['bazaars' => $bazaars]);

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
            $bazaar->Bazaar_BookingCost = $request->BazaarBookingCost;
            $bazaar->Bazaar_Status = $request->BazaarStatus;
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

    public function search()
    {

    }
}
