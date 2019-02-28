<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class bazaar extends Model
{
    //


    protected $primaryKey= "PK_BazaarID";


    public function stalls()
    {
        return $this->hasMany('App\stall','FK_BazaarID');
    }
}
