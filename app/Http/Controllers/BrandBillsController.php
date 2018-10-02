<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\billing;
use App\account;
use App\reservation;
use session;
use PDF;

class BrandBillsController extends Controller
{
    //
    public function index(){
        $currentAccount = account::where('PK_AccountID','=',Session::get('UserAccountID'))->first();
        $bills = billing::where([['FK_AccountID','=',Session::get('UserAccountID')], ['Billing_SubTotal', '>', 0]])->get();
        return view('navigation/brand/billing',['bills'=>$bills, 'currentAccount'=>$currentAccount]);
    }
    public function showBill($id){
      $reservation = reservation::find($id);
      $billing = billing::find($id);
      $TotalCost = $billing->Billing_NetTotal;

      if($billing->Billing_Status != "Void"){
        $ReservationAccountBrandInformations = DB::table('stalls')
        ->join('reservations','stalls.FK_ReservationID', '=', 'reservations.PK_ReservationID')
        ->join('billings', 'reservations.FK_BillingID', '=', 'billings.PK_BillingID')
        ->join('accounts','reservations.FK_AccountID', '=', 'accounts.PK_AccountID')
        ->join('guest_brands','accounts.FK_GuestBrandID','=','guest_brands.PK_GuestBrandID')
        ->where('PK_ReservationID', '=', $id)
        ->first();

        $reservedstalls = $reservation->stalls;
      }
      else{
        $ReservationAccountBrandInformations = DB::table('billings')
        ->join('stallsarchives', 'stallsarchives.FK_BillingID', '=', 'billings.PK_BillingID')
        ->join('stalls', 'stalls.PK_StallID', '=', 'stallsarchives.FK_StallID')
        ->join('reservations', 'reservations.FK_BillingID', '=', 'billings.PK_BillingID')
        ->join('accounts','reservations.FK_AccountID', '=', 'accounts.PK_AccountID')
        ->join('guest_brands','accounts.FK_GuestBrandID','=','guest_brands.PK_GuestBrandID')
        ->where('PK_ReservationID', '=', $id)
        ->first();

        $reservedstalls = DB::table('billings')
        ->join('stallsarchives', 'stallsarchives.FK_BillingID', '=', 'billings.PK_BillingID')
        ->join('stalls', 'stalls.PK_StallID', '=', 'stallsarchives.FK_StallID')
        ->where('PK_BillingID','=',$billing->PK_BillingID)
        ->get();
      }


      $currentAccount = account::where('PK_AccountID','=',Session::get('UserAccountID'))->first();

      return view("navigation/brand/bill", ['ReservedStalls'=> $reservedstalls,'TotalCost' => $TotalCost, 'ReservationAccountBrandInformations' => $ReservationAccountBrandInformations,'currentAccount' => $currentAccount,'billing'=>$billing]);

    }

    public function printBills($id){
      $reservation = reservation::find($id);
      $billing = billing::find($id);
      $TotalCost = $billing->Billing_NetTotal;

      $ReservationAccountBrandInformations = DB::table('stalls')
      ->join('reservations','stalls.FK_ReservationID', '=', 'reservations.PK_ReservationID')
      ->join('billings', 'reservations.FK_BillingID', '=', 'billings.PK_BillingID')
      ->join('accounts','reservations.FK_AccountID', '=', 'accounts.PK_AccountID')
      ->join('guest_brands','accounts.FK_GuestBrandID','=','guest_brands.PK_GuestBrandID')
      ->where('PK_ReservationID', '=', $id)
      ->first();

        $brand = PDF::loadView("pdf/bill",['ReservedStalls'=> $reservation->stalls,'TotalCost' => $TotalCost, 'ReservationAccountBrandInformations' => $ReservationAccountBrandInformations,'billing'=>$billing]);
        return $brand->download('invoice.pdf');
    }
}
