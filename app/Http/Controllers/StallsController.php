<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\stall;
use App\bazaar;
use App\account;
use DB;
use Session;
use Validator;
use Response;

class StallsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $rules =
     [
       'rentalcost' => 'required',
       'bookingcost' => 'required',
       'type' => 'required',
       'status' => 'required',
       'size' => 'required',
       'bazaarID' => 'required',
     ];

    public function index()
    {
        //
        return view("navigation/admin/manage_stalls");
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
        $validator = Validator::make(Input::all(),$this->rules);
          if($validator->fails()){
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
          }
          else{
            $stall = new stall;
            $stall->Stall_RentalCost = $request->rentalcost;
            $stall->Stall_BookingCost = $request->bookingcost;
            $stall->Stall_Type = $request->type;
            $stall->Stall_Size = $request->size;
            $stall->Stall_Status = $request->status;
            $stall->FK_BazaarID = $request->bazaarID;
            $stall->save();
            return response()->json($stall);
          }

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
        $ldate = date('Y-m-d H:i:s'); //gets current date
        $BazaarStalls = DB::table('stalls')
        ->leftJoin('reservations','reservations.PK_ReservationID','=','stalls.FK_ReservationID')
        ->leftJoin('accounts', 'accounts.PK_AccountID','=','reservations.FK_AccountID')
        ->leftJoin('guest_brands', 'guest_brands.PK_GuestBrandID', '=', 'accounts.FK_GuestBrandID')
        ->where('FK_BazaarID','=',$id)
        ->get(); //gets all stalls for a specific bazaar
        $BazaarVenue = bazaar::where("PK_BazaarID",$id)->pluck("Bazaar_Venue")->first();
        Session::put('BazaarID',$id);

        $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();
        return view("navigation/admin/manage_stalls" , ['stalls'=> $BazaarStalls, 'BazaarVenue' =>$BazaarVenue, 'currentAccount'=>$currentAccount]);


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
        if($validator->fails()){
          return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        else{
          $stall = stall::find($id);
          $stall->Stall_RentalCost = $request->rentalcost;
          $stall->Stall_BookingCost = $request->bookingcost;
          $stall->Stall_Type = $request->type;
          $stall->Stall_Size = $request->size;
          $stall->Stall_Status = $request->status;
          $stall->FK_BazaarID = $request->bazaarID;
          $stall->save();
          return response()->json($stall);
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
        $stall = stall::findorfail($id);
        $stall->delete();

        return response()->json($stall);
    }
}
