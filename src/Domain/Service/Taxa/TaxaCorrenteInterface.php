<?php

namespace App\Domain\Service\Taxa;

interface TaxaCorrenteInterface
{
    /**
     * @param float $valor
     * @return float
     */
    public function taxaDeposito(float $valor): float;

    /**
     * @param float $valor
     * @return float
     */
    public function taxaSacar(float $valor): float;
}