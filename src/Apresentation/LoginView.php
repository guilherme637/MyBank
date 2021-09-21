<?php

namespace App\Apresentation;

use App\FuncionalidadeBundle\View\ViewAbastract;

class LoginView extends ViewAbastract
{
    private string $cpf;
    private string $senha;

    public function wTitulo(string $value): void
    {
        $this->titulo = $this->spaceTitle($value);
    }

    public function rTitulo(): void
    {
        echo $this->titulo;
    }

    public function conteudo(array $value)
    {
        $this->cpf = $this->wRead($value[0]);

        $this->senha = $this->wRead($value[1]);
    }
}