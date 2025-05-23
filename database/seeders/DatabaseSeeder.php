<?php

namespace Database\Seeders;

use App\Models\Promoteur;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{


    public function run()
    {


       $user= User::updateOrCreate(
['email' => 'promo@gamil.com',
                'name' => 'djue',
                'prenom' => 'promoteur',
                'password' => Hash::make('Admin'),
                'role' => 'promoteur',
            ]
        );
        Promoteur::updateOrCreate(
            ['user_id'=>$user->id,
            'date_naissance'=>'2000-01-01',
            'lieu_naissance'=>'abidjan',
            'numero_cni'=>'123456789',
            'cni_image'=>'cni_image',

            ]



        );

}

}
