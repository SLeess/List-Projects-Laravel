<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        "username",
        "password",
        "last_login"
    ];

    public function notes(){
        return $this->hasMany(Note::class);
    }
}
