<?php

namespace App\Infrastructure\Service;

use App\Domain\Service\Taxa\TaxaCorrenteInterface;


class TaxaCorrente implements TaxaCorrenteInterface
{
    public function taxaDeposito(float $valor): float
    {
         return $valor / 0.1;
    }

    public function taxaSacar(float $valor): float
    {
        return $valor / 0.2;
    }
}