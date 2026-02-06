<?php

namespace App\Enum;

enum BookStatus: string
{
    case Available = 'available';
    case Borrowed = 'borrowed';
    case Unavailable = 'unavailable';
    
    public function getLabel(): string
    {
        return match ($this) {
            self::Available => 'Disponible', // L'opérateur de résolution de portée (::) est utilisé pour accéder aux constantes, méthodes et propriétés statiques d'une classe,
            self::Borrowed => 'Emprunté',   // ou d'une classe parente.
            self::Unavailable => 'Indisponible',
        };
    }
}