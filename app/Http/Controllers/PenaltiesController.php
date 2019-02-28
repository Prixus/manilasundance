<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\penalty;
use App\account;
use Session;
use Validator;
use Response;

class PenaltiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $rules =
     [
       'name' => 'required|max:255',
       'description' => 'required|max:1028',

     ];
    public function index()
    {
        $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();
        $Penalties = penalty::paginate(15);
        return view('navigation/admin/penalties',['Penalties' => $Penalties,'currentAccount'=>$currentAccount]);

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
        $validator = Validator::make(Input::all(), $this->rules);
        if($validator->fails()){
          return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        else{
        $Penalty = new penalty;
        $Penalty->Penalty_Name = $request->name;

        $Penalty->Penalty_Description = $request->description;
        $Penalty->save();
        return response()->json($Penalty);
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
        if($validator->fails()){
          return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        else{
        $Penalty = penalty::find($id);
        $Penalty->Penalty_Name = $request->name;
        $Penalty->Penalty_Description = $request->description;
        $Penalty->save();
        return response()->json($Penalty);
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
        $Penalty = penalty::findorfail($id);
        $Penalty->delete();

        return response()->json($Penalty);
    }
}
