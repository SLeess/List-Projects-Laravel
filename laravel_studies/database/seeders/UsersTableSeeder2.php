<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 2 - add more users
        $users = [
            [
                'username' => 'User2',
                'password' => bcrypt('senha'), //password_hash('senha', password_default)
            ],
            [
                'username' => 'User3',
                'password' => bcrypt('senha'), //password_hash('senha', password_default)
            ],
            [
                'username' => 'User4',
                'password' => bcrypt('senha'), //password_hash('senha', password_default)
            ],
        ];

        DB::table('users')->insert($users);
    }
}
