<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class socialMediaAssets extends Model
{
    //
    protected $primaryKey = "PK_SocialMediaAssetID";

    public function brands()
    {
      return $this->belongsTo('App\guestBrand', 'FK_GuestBrandID');
    }
}
