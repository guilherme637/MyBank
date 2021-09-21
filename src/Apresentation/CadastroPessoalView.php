<?php

namespace App\Apresentation;

use App\FuncionalidadeBundle\View\ViewAbastract;

class CadastroPessoalView extends ViewAbastract
{
    private string $nome;

    private string $cpf;

    private int $tipoConta;

    public function wTitulo(string $value): void
    {
        $this->titulo = $this->spaceTitle($value);
    }

    public function rTitulo(): void
    {
        echo $this->titulo;
    }

    public function conteudo(array $value): void
    {
        $this->write($value[0]);
        $this->tipoConta = $this->read();

        $this->write($value[1]);
        $this->nome = $this->read();

        $this->write($value[2]);
        $this->cpf = $this->read();
    }

    public function values(): \stdClass
    {
        $stdClass = new \stdClass();
        $stdClass->nome = $this->nome;
        $stdClass->cpf = $this->cpf;
        $stdClass->tipoConta = $this->tipoConta;

        return $stdClass;
    }
}