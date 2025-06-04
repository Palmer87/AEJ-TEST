<?php

namespace App\Models;
use apiplatform\Metadata\ApiResource;
use Illuminate\Database\Eloquent\Model;
#[ApiResource]
class Gestionnaire extends Model
{
    protected $fillable = [
        'user_id',
        'poste',
        'adresse',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
public function correction_Requests()
{
    return $this->hasMany(Correction::class);
}

}
