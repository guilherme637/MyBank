<?php

namespace App\FuncionalidadeBundle\View;

use App\FuncionalidadeBundle\IO\InOut;

abstract class ViewAbastract extends InOut
{
    protected string $titulo;
    protected string $mensagem;

    public function breakLine(): string
    {
        return "\n";
    }

    public function tabLine(): string
    {
        return "\t";
    }

    public function spaceTitle(string $value)
    {
        return "\n\n\t\t $value \n\n";
    }

    abstract public function wTitulo(string $value): void;
    abstract public function rTitulo(): void;
    abstract public function conteudo(array $value);
}