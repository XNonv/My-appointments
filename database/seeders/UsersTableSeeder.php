<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() //php artisan db:seed --class=UsersTableSeeder --> en la terminal de laragon
    {
        User::create([
            'name' => 'Victor Jesus Garzon Armas',
            'email' => 'victor.961004@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('4m3n2b1v'), // password
            // 'remember_token' => Str::random(10),
            'address' => '',
            'phone'=> '',
            'role'=> 'admin'
        ]);

        User::factory()
        ->count(50)
        ->create();
    }
}
