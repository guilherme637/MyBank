<?php

namespace App\Infrastructure\Factory\Conta;


use App\Infrastructure\Service\ContaAbstract;

abstract class CreatorAbstract
{
    private ContaAbstract $contaAbstract;

    public function __construct(ContaAbstract $contaAbstract)
    {
        $this->contaAbstract = $contaAbstract;
    }

    public function conta(): ContaAbstract
    {
        return $this->contaAbstract;
    }
}