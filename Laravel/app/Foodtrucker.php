<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foodtrucker extends Model
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'tell', 'image', 'location_id','user_id'
    ];
}
