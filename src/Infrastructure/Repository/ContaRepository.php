<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Entity\Banco;

class ContaRepository
{
    private Banco $banco;

    public function __construct(Banco $banco)
    {
        $this->entity = $banco;
    }

    public function findBy(array $condition)
    {
//        $this->banco->
    }
}