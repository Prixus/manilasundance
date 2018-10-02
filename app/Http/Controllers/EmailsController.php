<?php

namespace App\Http\Controllers;


use App\Mail\RegistrationApproved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class EmailsController extends Controller
{
    /**
     * Ship the given order.
     *
     * @param  Request  $request
     * @param  int  $orderId
     * @return Response
     */
    public function ship()
    {

        // Ship order...

        Mail::to('dessaalba08@gmail.com')->send(new RegistrationApproved());
    }
}