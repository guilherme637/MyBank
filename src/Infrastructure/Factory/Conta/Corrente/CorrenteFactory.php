<?php

namespace App\Infrastructure\Factory\Conta\Corrente;

use App\Domain\Factory\ContaFactoryInterface;
use App\Infrastructure\Entity\ContaCorrente;
use App\Infrastructure\Factory\Conta\CreatorAbstract;
use App\Infrastructure\Service\ContaAbstract;

class CorrenteFactory extends CreatorAbstract implements ContaFactoryInterface
{
    public function createConta(): ContaAbstract
    {
        return new ContaCorrente(
            $this->conta()->getPessoa(),
            $this->conta()->getAgencia(),
            $this->conta()->getConta()
        );
    }
}