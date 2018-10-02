<?php

namespace App\Http\Middleware;
use App\billing;
use App\account;
use DB;
use Session;
use Carbon\Carbon;
use App\Notifications\billDueDateNotification;

use Closure;

class checkBillDueDate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if(Session::get('UserAccountID')==null){
        return redirect('/login');
      }
      else{
          $billings = billing::where([['FK_AccountID','=',Session::get('UserAccountID')],['Billing_Status','=','Half Paid']])->orWhere([['FK_AccountID','=',Session::get('UserAccountID')],['Billing_Status','=','Not Paid']])->get();
          foreach($billings as $billing){
          $notification = DB::table('notifications')->whereRaw("data LIKE '%You have pending balance to be paid to make a half payment. Your Total balance to be paid is%' AND DATE_FORMAT(created_at,'%d' ) = DATE_FORMAT(NOW(),'%d')")->count();
              if($notification <= 0){
              $accountToBeNotified = account::find(Session::get('UserAccountID'));
              $accountToBeNotified->notify(new billDueDateNotification($billing));

              break;
            }
            else{


                          break;
            }

          }
          return $next($request);
      }
    }
}
