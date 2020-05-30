<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    public $fillable = ['product_name','product_avatar','product_description','price','sale_price','new','status','ingredient','id_type'];
}
