<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promoteur extends Model
{
    protected $fillable = ['utilisateur_id', 'date_naissance', 'lieu_naissance', 'numero_cni', 'cni_image'];

    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }
}
