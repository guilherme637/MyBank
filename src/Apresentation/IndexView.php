<?php

namespace App\Apresentation;

use App\FuncionalidadeBundle\View\ViewAbastract;

class IndexView extends ViewAbastract
{
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
        $this->wRead($value[0]);
    }

}