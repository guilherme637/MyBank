<?php declare(strict_types=1);

namespace App\Infrastructure\Entity;

use App\Infrastructure\Types\Cpf;

class Pessoa
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
     * @return string
     */
    public function mostrarCpf(): string
    {
        return $this->cpf->mostraCpf();
    }

    public function mostrarNumeroCpf(): int
    {
        return $this->cpf->mostraNumero();
    }
}