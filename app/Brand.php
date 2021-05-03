<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','img_path'];
    protected $table = "hangxe";
}