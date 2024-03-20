<?php

namespace App\Models;

use App\Models\Customer;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['customer_id','product_id','comment'];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id' ,'customer_id' );
    }

}
