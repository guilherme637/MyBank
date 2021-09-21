<?php

namespace App\Domain\Entity;

interface ContaInterface
{
    /**
     * @param float $valor
     */
    public function depositar(float $valor): self;

    /**
     * @param float $valor
     * @return string
     */
    public function sacar(float $valor): void;
}