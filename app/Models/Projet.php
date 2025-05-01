<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'promoteur_id',
        'type_projet',
        'forme_juridique',
        'paln_affaire',
        'status',
    ];

    public function promoteur()
    {
        return $this->belongsTo(Promoteur::class);
    }
}
