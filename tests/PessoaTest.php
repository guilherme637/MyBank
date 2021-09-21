<?php

use App\Infrastructure\Entity\Cpf;
use App\Infrastructure\Entity\Pessoa;
use App\Infrastructure\Exception\CpfException;
use App\Infrastructure\Exception\PessoaArgumentException;
use PHPUnit\Framework\TestCase;

class PessoaTest extends TestCase
{
    /**
     * @test
     */
    public function excecoesPessoaNome()
    {
        $this->expectException(PessoaArgumentException::class);
        new Pessoa('G', new Cpf('953.200.730-03'), 'Masculino');
    }

    /** @test  */
    public function execaoSexo()
    {
        $this->expectException(PessoaArgumentException::class);
        $this->expectExceptionMessage('Sexo precisa ser abreviado');

        new Pessoa('Guilherme', new Cpf('953.200.730-03'), 'Masculino');
    }
}