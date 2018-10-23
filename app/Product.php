<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable=['product_name','product_short_description','product_logn_description','product_price','product_image','product_size','product_color','publication_status'];
}
