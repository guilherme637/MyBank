<?php

namespace App\Infrastructure\Factory\Conta\Poupanca;

use App\Domain\Factory\ContaFactoryInterface;
use App\Infrastructure\Entity\ContaPoupaca;
use App\Infrastructure\Factory\Conta\CreatorAbstract;
use App\Infrastructure\Service\ContaAbstract;

class PoupancaFactory extends CreatorAbstract implements ContaFactoryInterface
{
    public function createConta(): ContaAbstract
    {
        return new ContaPoupaca(
            $this->conta()->getPessoa(),
            $this->conta()->getAgencia(),
            $this->conta()->getConta()
        );
    }
}