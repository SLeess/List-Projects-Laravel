<?php

namespace App\Services;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class Operations{
    public static function decryptID($id){
        //check if id is encrypted
        try{
            $id = Crypt::decrypt($id);

        } catch (DecryptException $e) {
            // abort(0, $e->getMessage());
            return null;
        }
        return $id;
    }
}
