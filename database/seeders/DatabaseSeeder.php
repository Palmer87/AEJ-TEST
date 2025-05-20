<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

<<<<<<< HEAD
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
=======
        User::updateOrCreate(
            ['email' => 'admin@gamil.com'],
            [
                'name' => 'Administrateur',
                'prenom' => 'Administrateur',
                'password' => Hash::make('Admin'),
                'role' => 'admin',
            ]
        );
>>>>>>> ac97c10 (refactor:Améliore la création de gestionnaires en utilisant directement la méthode create dans le modèle, simplifiant ainsi le processus et améliorant la lisibilité du code.)
    }

}
