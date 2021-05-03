<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','image_path','brand_id','price','sku','status','hire_price','description','status'];
    protected $table = "xe";
}
