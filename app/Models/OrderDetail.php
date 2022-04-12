<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    public $timestamps = false;
    protected $fillable = ['price', 'quantity','order_id','product_id'];


    public function prod()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
