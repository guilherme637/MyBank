<?php declare(strict_types=1);

namespace App\Infrastructure\Entity;

use App\Infrastructure\Service\ContaAbstract;

class ContaCorrente extends ContaAbstract
{
    /**
     * @var bool
     */
    private bool $isCorrente;

    public function __construct(Pessoa $pessoa, int $agencia, int $conta)
    {
        parent::__construct($pessoa, $agencia, $conta);

        $this->isCorrente = true;
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
     * @return void
     */
    public function sacar(float $valor): void
    {
        $this->saldo -= $valor;
    }

    /**
     * @return bool
     */
    public function isCorrente(): bool
    {
        return $this->isCorrente;
    }
}