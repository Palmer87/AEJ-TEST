<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use ApiPlatform\Metadata\ApiResource;

/**
 *
 *
 * @property int $id
 * @property int $promoteur_id
 * @property string $titre
 * @property string $type_projet
 * @property string $forme_juridique
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $plan_affaires
 * @property-read \App\Models\Promoteur $promoteur
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet whereFormeJuridique($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet wherePlanAffaires($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet wherePromoteurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet whereTitre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet whereTypeProjet($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Projet whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class Projet extends Model
{

    protected $fillable = [
        'titre',
        'promoteur_id',
        'type_projet',
        'forme_juridique',
        'plan_affaires',
        'status',
        'description'

    ];
    // app/Models/Projet.php

public function correction_Requests()
{
    return $this->hasMany(Correction::class);
}



    public function promoteur()
    {
        return $this->belongsTo(Promoteur::class);
    }
}
