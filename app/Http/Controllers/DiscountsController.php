<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\discount;
use Validator;
use Response;

class DiscountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $rules =
     [
       'name' => 'required|max:255',
       'requirement' => 'required',
       'datestart' => 'required|after:today',
       'dateend' => 'required|after:datestart',
       'timestart' => 'required',
       'timeend' => 'required',
       'amount' => 'required',
     ];
    public function index()
    {
        //
        $discounts = discount::orderBy('PK_DiscountID','DESC')->get();
        return view('navigation/admin/discounts',['discounts' => $discounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


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
        $validator = Validator::make(Input::all(), $this->rules);
          if ($validator->fails()) {
              return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
          }
          else{
            $Discount = new discount;
            $Discount->Discount_Name = $request->name;
            $Discount->Discount_Requirements = $request->requirement;
            $Discount->Discount_ValidDateEnd = $request->dateend;
            $Discount->Discount_ValidDateStart = $request->datestart;
            $Discount->Discount_ValidTimeStart = $request->timestart;
            $Discount->Discount_ValidTimeEnd = $request->timeend;
            $Discount->Discount_Amount = $request->amount;
            $Discount->save();
            return response()->json($Discount);
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
            $Discount = discount::find($id);
            $Discount->Discount_Name = $request->name;
            $Discount->Discount_Requirements = $request->requirement;
            $Discount->Discount_ValidDateEnd = $request->dateend;
            $Discount->Discount_ValidDateStart = $request->datestart;
            $Discount->Discount_ValidTimeStart = $request->timestart;
            $Discount->Discount_ValidTimeEnd = $request->timeend;
            $Discount->Discount_Amount = $request->amount;
            $Discount->save();
            return response()->json($Discount);
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
        $Discount = discount::findorfail($id);
        $Discount->delete();

        return response()->json($Discount);
    }
}
