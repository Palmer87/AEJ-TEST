<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{

    protected $fillable = [
        'titre',
        'type_projet',
        'forme_juridique',
        'etat',
        'plan_affaires'
    ];

}
