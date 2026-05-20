<?php

namespace App\Enums;

enum Type: string
{
    case DEBITO = 'D'; // Valor no banco de dados
    case CREDITO = 'C'; // Valor no banco de dados

    public function label(): string
    {
        return match ($this) {
            self::DEBITO => 'Débito',
            self::CREDITO => 'Crédito',
        };
    }
}
