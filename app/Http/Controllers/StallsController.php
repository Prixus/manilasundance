<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\stall;
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
        $stalls = stall::where("FK_BazaarID", $id)->get();
        $stallCount = stall::where("FK_BazaarID", $id)->count();
        $stallFirst = stall::where("FK_BazaarID", $id)->pluck("PK_StallID")->first();
        Session::put('BazaarID',$id);

        return view("navigation/admin/manage_stalls" , ['stalls' => $stalls,'stallCount'=>$stallCount,'stallFirst'=>$stallFirst]);


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
