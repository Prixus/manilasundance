<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    //
    protected $primaryKey = 'PK_AccountID';

    public function reservations()
    {
      return $this->hasMany('App\reservation','FK_AccountID');
  }
}
