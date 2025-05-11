<?php

namespace App;
namespace App\Enums;
enum ProjetStatus:string

{
    case EN_ATTENTE = 'en attente';
    case VALIDE = 'valide';
    case REJETE = 'rejeté';

    public function badgeColor(): string
    {
        return match($this) {
            self::EN_ATTENTE => 'warning',
            self::VALIDE => 'success',
            self::REJETE => 'danger',
        };
    }
}

    //

