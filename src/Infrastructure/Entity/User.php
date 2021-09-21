<?php

namespace App\Infrastructure\Entity;

use App\Infrastructure\Types\Cpf;

class User
{
    /**
     * @var Cpf
     */
    private Cpf $cpf;

    /**
     * @var string
     */
    private string $senha;

    public function __construct(Cpf $cpf, string $senha)
    {
        $this->cpf = $cpf;
        $this->senha = $senha;
    }

    /**
     * @return Cpf
     */
    public function getCpf(): Cpf
    {
        return $this->cpf;
    }

    /**
     * @return string
     */
    public function getSenha(): string
    {
        return $this->senha;
    }
}