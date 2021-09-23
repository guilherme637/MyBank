<?php

namespace App\Infrastructure\Dto;

use App\Domain\Service\Taxa\TaxaCorrenteInterface;
use App\Infrastructure\Persistence\Pessoa;
use App\Infrastructure\Exception\ContaArgumentException;
use App\Infrastructure\Service\{ContaAbstract, TaxaCorrente};

class ContaCorrenteDto extends ContaAbstract
{
    /**
     * @var TaxaCorrenteInterface
     */
    private TaxaCorrenteInterface $taxa;

    public function __construct(Pessoa $pessoa, int $agencia, int $conta)
    {
        parent::__construct($pessoa, $agencia, $conta);

        if (strlen($agencia) !== 4 || $agencia != '1111') {
            throw new ContaArgumentException('Agência inválida.');
        }

        if (strlen($conta) != 5) {
            throw new ContaArgumentException('Conta inválida.');
        }

        $this->taxa = new TaxaCorrente();
    }

    /**
     * @param float $valor
     */
    public function depositar(float $valor): self
    {
        if ($valor < 0) {
            throw new ContaArgumentException('Operação incorreta');
        }

        $valorTaxa = $this->taxa->taxaDeposito($valor);

        $this->saldo += $valorTaxa;

        return $this;
    }

    /**
     * @param float $valor
     * @return string
     */
    public function sacar(float $valor): void
    {
        if ($valor < 0) {
            throw new ContaArgumentException('Operação incorreta');
        }

        if ($valor > $this->saldo) {
            throw new ContaArgumentException('Saldo insuficiente');
        }

        $valorTaxa = $this->taxa->taxaSacar($valor);

        $this->saldo -= $valorTaxa;
    }
}