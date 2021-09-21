<?php

namespace App\Infrastructure\Strategy\Transferencia;

use App\Domain\Strategy\TransferenciaInterface;
use App\Infrastructure\Exception\ContaArgumentException;

class DocStrategy implements TransferenciaInterface
{
    public function juros(float $valor): float
    {


        return $valor / 2.25;
    }
}