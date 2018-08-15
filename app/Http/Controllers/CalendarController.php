<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\bazaar;
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
      $bazaars = bazaar::all();
      return view('navigation/admin/calendar', ['bazaars' => $bazaars]);
    }

    public function viewCalendar(){
                $TotalCost = 0.00;
                
                $reservationID = Session::get('ReservationID');
                $reservation = reservation::find($reservationID);

                foreach($reservation->stalls as $stalls){
                                  $TotalCost += $stalls->Stall_RentalCost + $stalls->Stall_BookingCost;
                }

                $billing = billing::find(Session::get('BillingID'));
                $billing->Billing_SubTotal = $TotalCost;
                $billing->Billing_NetTotal = $TotalCost-$billing->Billing_SubTotalDiscount;
                $billing->save();

                $ReservationAccountBrandInformations = DB::table('stalls')
                ->join('reservations','stalls.FK_ReservationID', '=', 'reservations.PK_ReservationID')
                ->join('accounts','reservations.FK_AccountID', '=', 'accounts.PK_AccountID')
                ->join('guest_brands','accounts.FK_GuestBrandID','=','guest_brands.PK_GuestBrandID')
                ->where('PK_ReservationID', '=', $reservationID)
                ->get();

                return view("navigation/brand/bill", ['ReservedStalls'=> $reservation->stalls,'TotalCost' => $TotalCost, 'ReservationAccountBrandInformations' => $ReservationAccountBrandInformations]);


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
