<?php

namespace App\Domain\Entity;

use App\Infrastructure\Entity\Pessoa;

interface PessoaInterface
{
    /**
     * @return Pessoa
     */
    public function pessoa(): Pessoa;
}