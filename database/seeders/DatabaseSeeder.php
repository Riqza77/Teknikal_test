<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        'name' =>'SuperAdmin',
        'password' =>bcrypt('123'),
        'role' =>1,
        ]);
        User::create([
        'name' =>'Sales',
        'password' =>bcrypt('123'),
        'role' =>2,
        ]);
        User::create([
        'name' =>'Purchase',
        'password' =>bcrypt('123'),
        'role' =>3,
        ]);
        User::create([
        'name' =>'Manager',
        'password' =>bcrypt('123'),
        'role' =>4,
        ]);
    }
}
