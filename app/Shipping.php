<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
     protected $fillable=['shipping_email','shipping_fristname','shipping_lastname','shipping_address','shipping_number','shipping_city'];
}
