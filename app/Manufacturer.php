<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
     protected $fillable=['manufacturer_name','manufacturer_description','publication_status'];
}
