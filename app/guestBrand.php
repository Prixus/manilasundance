<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class guestBrand extends Model
{
    //
    protected $primaryKey = "PK_GuestBrandID";

    public function socialMediaAssets()
    {
      return $this->hasMany('App\socialMediaAssets', 'FK_GuestBrandID');
    }

    public function products()
    {
      return $this->hasMany('App\product', 'FK_GuestBrandID');
    }
}
