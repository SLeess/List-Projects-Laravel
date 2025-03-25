<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // public function client

    protected $fillable = [
        "client_id",
        "product_id",
        "quantity",
        "order_number"
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
    public function client()
    {
        return $this->hasOne(Client::class);
    }
}
