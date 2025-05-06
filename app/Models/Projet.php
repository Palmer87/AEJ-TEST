<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'titre',
        'promoteur_id',
        'type_projet',
        'forme_juridique',
        'plan_affaires',
        'status'

    ];
    public function promoteur()
    {
        return $this->belongsTo(Promoteur::class);
    }
}
