<?php

namespace App\Domain\Strategy;

interface TransferenciaInterface
{
    public function juros(float $valor): float;
}