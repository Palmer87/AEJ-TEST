<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

}
