<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function categories(){
        return $this->belongsTo(Category::class);
    }

    public function carts(){
        return $this->hasOne(Cart::class);
    }

    public function orderDetail()
    {
        return $this->hasOne(OrderDetail::class);
    }

    public function scopeSearch($query)
    {
        if($q = request()->q){
            $query = $query->where('title', 'like', '%'.$q.'%');
        }

        return $query;
    }

    public function scopeFilterDevice($query)
    {
        if($cate = request()->category_device)
        {
            $query = $query->whereIn('category_id', $cate);
        }
        return $query;
    }

    public function scopeFilterBrand($query)
    {
        if($category_brand = request()->category_brand)
        {
            $query = $query->whereIn('brand_id', $category_brand);
        }

        return $query;
    }

    public function scopeSort($query)
    {
        if(request()->sort)
        {
            if(request()->sort == 'price_inc')
            {
                $query = $query->orderBy('price', 'ASC');
            }
            if(request()->sort == 'price_dec')
            {
                $query = $query->orderBy('price', 'DESC');
            }
            if(request()->sort == 'on_stock')
            {
                $query = $query->where('stock','!=', 0);
            }
            if(request()->sort == 'atoz')
            {
                $query = $query->orderBy('title', 'ASC');
            }
        }
        return $query;
    }
}
