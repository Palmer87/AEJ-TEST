<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $utilisateur_id
 * @property string $date_naissance
 * @property string $lieu_naissance
 * @property string $numero_cni
 * @property string $cni_image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Projet> $projets
 * @property-read int|null $projets_count
 * @property-read Promoteur|null $promoteur
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur whereCniImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur whereDateNaissance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur whereLieuNaissance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur whereNumeroCni($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Promoteur whereUtilisateurId($value)
 * @mixin \Eloquent
 */
class Promoteur extends Model
{
    protected $fillable = ['user_id', 'date_naissance', 'lieu_naissance', 'numero_cni', 'cni_image'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function projets()
{
    return $this->hasMany(Projet::class);
}


}
