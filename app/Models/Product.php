<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','image','sale_price','price','status','category_id','description'];

    public function cat()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
}
