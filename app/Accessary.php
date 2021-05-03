<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessary extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','date_manufacture','status'];
    protected $table = "phutungxe";
}
