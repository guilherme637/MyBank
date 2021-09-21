<?php

namespace App\Infrastructure\Factory\Conta;

use App\Domain\Factory\ContaFactoryInterface;
use App\Infrastructure\Service\ContaAbstract;

abstract class ContaFactoryAbstract
{
    abstract public function createTypeConta(ContaAbstract $contaDto): ContaFactoryInterface;

}