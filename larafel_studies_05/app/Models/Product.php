<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $casts = [
        "price" => "float",
    ];
    protected $fillable = [
        "product_name",
        "price",
    ];

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'orders', 'product_id', 'client_id', 'id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id', 'id');
    }
}
