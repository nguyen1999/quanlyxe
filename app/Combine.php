<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Combine extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['car_id','accessary_id'];
    protected $table = "lapxe";
}
