<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','phone','sex','address','car_id','start_date_at','start_time_at','identity_card_number','email','status'];
    protected $table = "lichdatxe";
}
