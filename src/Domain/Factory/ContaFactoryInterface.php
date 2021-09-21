<?php

namespace App\Domain\Factory;

use App\Infrastructure\Service\ContaAbstract;

interface ContaFactoryInterface
{
    public function createConta(): ContaAbstract;
}