<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'orders', 'product_id', 'client_id', 'id', 'id');
    }
}
