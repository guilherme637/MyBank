<?php

namespace App\Infrastructure\Factory\Pessoa;

use App\Domain\Entity\PessoaInterface;
use App\Infrastructure\Persistence\Pessoa;
use App\Infrastructure\Dto\PessoaDto;

class PessoaFactory implements PessoaInterface
{
    /**
     * @var PessoaDto
     */
    private PessoaDto $pessoaDto;

    public function __construct(PessoaDto $pessoaDto)
    {
        $this->pessoaDto = $pessoaDto;
    }

    /**
     * @return Pessoa
     */
    public function pessoa(): Pessoa
    {
        return new Pessoa(
            $this->pessoaDto->mostrarNome(),
            $this->pessoaDto->cpf()
        );
    }
}