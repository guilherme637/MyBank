<?php

namespace App\Infrastructure\Strategy\Transferencia;

use App\Domain\Strategy\TransferenciaInterface;

class PixStrategy implements TransferenciaInterface
{
    public function juros(float $valor): float
    {
        return $valor;
    }
}