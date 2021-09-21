<?php

namespace App\Infrastructure\Strategy\Transferencia;

use App\Domain\Strategy\TransferenciaInterface;
use App\Infrastructure\Exception\ContaArgumentException;

class TedStrategy implements TransferenciaInterface
{
    public function juros(float $valor): float
    {
        if (gmdate('N') == 7 || gmdate('N') == 6) {
            throw new ContaArgumentException('Horário TED: 06:30h às 17h, de segunda a sexta-feira');
        }

        return $valor / 1.50;
    }
}