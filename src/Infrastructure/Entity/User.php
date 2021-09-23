<?php

namespace App\Infrastructure\Entity;

use App\Domain\Entity\UserInteraface;
use App\Infrastructure\Types\Cpf;

class User implements UserInteraface
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

    public function getUsername(): int
    {
        return $this->cpf->mostraNumero();
    }

    public function getPassword(): int
    {
        return $this->senha;
    }
}