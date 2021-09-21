<?php
declare(strict_types=1);

namespace App\Infrastructure\Service;

use App\Domain\Entity\ContaInterface;
use App\Infrastructure\Entity\Pessoa;

abstract class ContaAbstract implements ContaInterface
{
    /**
     * @var Pessoa
     */
    protected Pessoa $pessoa;

    /**
     * @var int
     */
    protected int $agencia;

    /**
     * @var int
     */
    protected int $conta;

    /**
     * @var float
     */
    protected float $saldo;

    public function __construct(Pessoa $pessoa, int $agencia, int $conta)
    {
        $this->pessoa = $pessoa;
        $this->agencia = $agencia;
        $this->conta = $conta;
        $this->saldo = 0;
    }

    /**
     * @return Pessoa
     */
    public function getPessoa(): Pessoa
    {
        return $this->pessoa;
    }

    /**
     * @return int
     */
    public function getAgencia(): int
    {
        return $this->agencia;
    }

    /**
     * @return int
     */
    public function getConta(): int
    {
        return $this->conta;
    }

    /**
     * @return float
     */
    public function getSaldo(): float
    {
        return $this->saldo;
    }
}