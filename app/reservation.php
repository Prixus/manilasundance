<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    //
      protected $primaryKey = 'PK_ReservationID';

      public function bills()
      {
        return $this->belongsTo('App\billing', 'FK_BillingID');
      }
      public function stalls()
      {
        return $this->hasMany('App\stall', 'FK_ReservationID');
      }

      public function account()
      {
        return $this->belongsTo('App\account', 'FK_AccountID');
      }
}
