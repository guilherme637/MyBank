<?php

namespace App\Infrastructure\Factory\Conta\Corrente;

use App\Domain\Factory\ContaFactoryInterface;
use App\Infrastructure\Factory\Conta\ContaFactoryAbstract;
use App\Infrastructure\Service\ContaAbstract;

class CorrenteConcrete extends ContaFactoryAbstract
{
    public function createTypeConta(ContaAbstract $contaDto): ContaFactoryInterface
    {
        return new CorrenteFactory($contaDto);
    }
}