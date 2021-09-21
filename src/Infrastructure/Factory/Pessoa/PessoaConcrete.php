<?php

namespace App\Infrastructure\Factory\Pessoa;

use App\Infrastructure\Dto\PessoaDto;

class PessoaConcrete extends PessoaCreatorAbstract
{
    /**
     * @param PessoaDto $pessoaDto
     * @return PessoaFactory
     */
    function create(PessoaDto $pessoaDto): PessoaFactory
    {
        return new PessoaFactory($pessoaDto);
    }
}