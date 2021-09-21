<?php

namespace App\Infrastructure\Dto;

use App\Infrastructure\Exception\NomeException;
use App\Infrastructure\Types\Cpf;

class PessoaDto
{
    /**
     * @var string
     */
    private string $nome;

    /**
     * @var Cpf
     */
    private CPF $cpf;

    public function __construct(string $nome, CPF $cpf)
    {
        if (strlen($nome) < 3) {
            throw new NomeException('Nome precisa ter mais que 3 letras.');
        }

        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    /**
     * @return string
     */
    public function mostrarNome(): string
    {
        return $this->nome;
    }

    /**
     * @return Cpf
     */
    public function cpf(): Cpf
    {
        return $this->cpf;
    }
}