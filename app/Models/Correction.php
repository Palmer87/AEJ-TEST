<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
#[ApiResource]
class Correction extends Model
{
    use HasFactory;

    protected $fillable = [
        'projet_id',
        'message',
        'gestionnaire_id',
        'status',
    ];

    /**
     * Relation avec le modèle Projet
     */
    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    /**
     * Relation avec le modèle Gestionnaire
     */
    public function gestionnaire()
    {
        return $this->belongsTo(Gestionnaire::class);
    }
}
