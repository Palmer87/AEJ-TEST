<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    
    protected $fillable = ['nom','description','date_debut','date_fin','budget','etat','id_client','id_chef_projet'];

}
