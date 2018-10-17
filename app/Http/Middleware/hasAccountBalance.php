<?php

namespace App\Http\Middleware;

use App\account;
use Closure;
use Session;

class hasAccountBalance
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
        $currentAccount = account::find(Session::get('UserAccountID'));
        if($currentAccount->Account_Balance > 0){
          return redirect('/brand/bazaars')->with('status','Account Balance has been found. Please pay the previous balance from the past reservation');
        }
        else{
          return $next($request);
        }
      }
    }
}
