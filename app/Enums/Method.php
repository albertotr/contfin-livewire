<?php

namespace App\Enums;

enum Method: string
{

    case CASH = 'D';
    case CARD = 'C';
    case TRANSFER = 'T';
    case PIX = 'P';

    public function label(): string
    {
        return match ($this) {
            self::CASH => 'Dinheiro',
            self::TRANSFER => 'Transferencia Bancária',
            self::PIX => 'PIX',
            self::CARD => 'Cartão de Débito'
        };
    }
}
