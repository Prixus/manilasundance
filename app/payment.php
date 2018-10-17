<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    //
    protected $primaryKey = "PK_PaymentID";

    public function hasBill(){
      return $this->belongsToOne('App\billings', 'FK_BillingID');
    }
}
