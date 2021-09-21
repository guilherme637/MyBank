<?php

namespace App\Infrastructure\Factory\Conta\Poupanca;

use App\Infrastructure\Factory\Conta\ContaFactoryAbstract;
use App\Infrastructure\Service\ContaAbstract;

class PoupancaConcrete extends ContaFactoryAbstract
{
    public function createTypeConta(ContaAbstract $contaDto): PoupancaFactory
    {
        return new PoupancaFactory($contaDto);
    }
}