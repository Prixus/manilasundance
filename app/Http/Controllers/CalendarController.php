<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\bazaar;
use App\account;
use Session;
use Validator;
use Response;

class CalendarController extends Controller
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
     ];

    public function index()
    {
      $currentAccount = account::where('PK_AccountID','=',Session::get('UserID'))->first();
      $bazaars = bazaar::where('Bazaar_Status','=','Available')->get();
      return view('navigation/admin/calendar', ['bazaars' => $bazaars, 'currentAccount'=>$currentAccount]);
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
