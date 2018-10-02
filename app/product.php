<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
      protected $primaryKey = 'PK_ProductID';

      public function brands()
      {
        return $this->belongsTo('App\guestBrand', 'FK_GuestBrandID');
      }
}
