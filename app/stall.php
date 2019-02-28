<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stall extends Model
{
    //
      protected $primaryKey = 'PK_StallID';

    public function reservations(){
      return $this->belongsTo('App\reservations', 'FK_ReservationID');
    }
}
