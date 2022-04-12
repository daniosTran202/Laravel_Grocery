<?php
namespace App\Models; // thư mục cứa file Category.php
use Illuminate\Database\Eloquent\Model; // model gốc của thư viện
use Illuminate\Database\Eloquent\softDeletes; // model gốc của thư viện


class Category extends Model // kế thừa model gốc
{
    use softDeletes;
    protected $table = 'categories'; // các trường dữ liệu của bảng
    protected $date = ['deleted_at'];
    protected $fillable = ['name','status']; // các trường dữ liệu của bảng

    public function prods()
    {
        return $this->hasMany(Product::class,'category_id', 'id');
    }

    public function scopeSearch($query)
    {
        if(request()->keyword){
            $key = request()->keyword;
            $query = $query->where('name' ,'LIKE', '%'.$key.'%');
        }
        return $query;
    }

    public function scopeCatUpdate($query, $id)
    {
        $query = $query->where('id',$id)->update(request()->only('name', 'status'));
        return $query;
    }
        
}
