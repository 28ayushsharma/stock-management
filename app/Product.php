<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $table = 'product';
    protected $fillable = ['id', 'name','category', 'quantity', 'purchased_from', 'date', 'price' , 'reorder_quantity'];
}
