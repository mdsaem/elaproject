<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
       protected $fillable=['order_details_id','order_id','product_id','product_name','product_price','product_sales_quantity'];

         
}

         
