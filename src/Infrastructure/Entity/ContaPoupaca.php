<?php

namespace App\Infrastructure\Entity;

use App\Infrastructure\Service\ContaAbstract;

class ContaPoupaca extends ContaAbstract
{
    public function __construct(Pessoa $pessoa, int $agencia, int $conta)
    {
        parent::__construct($pessoa, $agencia, $conta);
        $this->saldo = 50;
    }

    /**
     * @param float $valor
     * @return $this
     */
    public function depositar(float $valor): self
    {
        $this->saldo += $valor;

        return $this;
    }

    /**
     * @param float $valor
     */
    public function sacar(float $valor): void
    {
        $this->saldo -= $valor;
    }
}