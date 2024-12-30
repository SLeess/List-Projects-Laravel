<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder3 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 3 - add users with random data
        $users = [];
        for($index = 0; $index < 10; $index++){
            $users[] = [
                'username' => Str::random(10),
                'password' => bcrypt('senha'), //password_hash('senha', password_default)
            ];
        }
        DB::table('users')->insert($users);
    }
}
