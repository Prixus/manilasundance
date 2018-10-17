<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class billing extends Model
{
    //
    protected $primaryKey = 'PK_BillingID';

    public function reservation(){
      return $this->hasOne('App\reservation', 'FK_BillingID');
    }

    public function account(){
      return $this->belongsToOne('App\account', 'FK_AccountID');
    }

    public function penaltymade(){
     return $this->hasMany('App\penaltycomitteds', 'FK_BillingID');
   }

   public function paymentsMade(){
     return $this->hasMany('App\payment', 'FK_BillingID');
   }
}
