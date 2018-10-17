<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class account extends Model
{
  use notifiable;
    //
    protected $primaryKey = 'PK_AccountID';

    public function reservations()
    {
      return $this->hasMany('App\reservation','FK_AccountID');
  }

}
