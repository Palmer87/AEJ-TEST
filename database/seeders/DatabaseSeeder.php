<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        User::create([
            'name' => 'admin',
            'prenom' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('djue1234'),
            'role' => 'admin',
        ]);


        User::create([
            'name' => 'admin',
            'prenom' => 'admin',
            'email' => 'admin1@gamil.com',
            'password' => Hash::make('djue1234'),
            'role' => 'admin',
        ]);
    }

}
