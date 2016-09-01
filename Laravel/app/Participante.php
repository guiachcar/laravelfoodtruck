<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'foodtrucker_id', 'event_id', 'menu_id', 
    ];
}
