<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //

    public function phone()
    {
        return $this->hasOne(Phone::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'orders', 'client_id', 'product_id')->distinct();
    }

    public function productsWithDataBuy()
    {
        return $this->belongsToMany(Product::class, 'orders', 'client_id', 'product_id')
                    ->withPivot('id','quantity', 'order_number')
                    ->withTimestamps();
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'client_id', 'id');
    }
}
