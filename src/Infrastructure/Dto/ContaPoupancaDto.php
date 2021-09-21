<?php

namespace App\Infrastructure\Dto;

use App\Infrastructure\Entity\Pessoa;
use App\Infrastructure\Exception\ContaArgumentException;
use App\Infrastructure\Service\ContaAbstract;

class ContaPoupancaDto extends ContaAbstract
{
    public function __construct(Pessoa $pessoa, int $agencia, int $conta)
    {
        parent::__construct($pessoa, $agencia, $conta);
        $this->saldo = 50;
    }

    public function depositar(float $valor): self
    {
        if ($valor < 0) {
            throw new ContaArgumentException('Operação inválida');
        }

        $this->saldo += $valor;

        return $this;
    }

    public function sacar(float $valor): void
    {
        if ($valor < 0) {
            throw new ContaArgumentException('Operação inválida');
        }

        $this->saldo -= $valor;
    }
}