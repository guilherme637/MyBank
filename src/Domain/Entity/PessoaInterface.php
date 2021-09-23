<?php

namespace App\Domain\Entity;

use App\Infrastructure\Persistence\Pessoa;

interface PessoaInterface
{
    /**
     * @return Pessoa
     */
    public function pessoa(): Pessoa;
}