<?php

namespace App\FuncionalidadeBundle;

abstract class ActionAbastract
{
    private int $option;

    public function setOption(int $option): void
    {
        $this->option = $option;
    }

    public function getOption(): int
    {
        return $this->option;
    }
}