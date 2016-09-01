<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuHasProduct extends Model
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id', 'product_id','active', 
    ];
}
