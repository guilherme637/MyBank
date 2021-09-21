<?php

namespace App\Infrastructure\Factory\Pessoa;

use App\Infrastructure\Dto\PessoaDto;

abstract class PessoaCreatorAbstract
{
    /**
     * @param PessoaDto $pessoaDto
     * @return PessoaFactory
     */
    abstract function create(PessoaDto $pessoaDto): PessoaFactory;

}