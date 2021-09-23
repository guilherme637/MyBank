<?php

use App\Infrastructure\Persistence\Cpf;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    /**
     * @test
     */
    public function mensagemCpfMais11Digitos()
    {
        $this->expectOutputString('CPF precisa ter 11 digitos', );
        new Cpf('123123131131313131');
    }

    /**
     * @test
     */
    public function mensagemCpfInvalido()
    {
        $this->expectOutputString('O CPF informado é inválido');
        new Cpf('123.456.789-01');
    }

    /**
     * @test
     */
    public function mensagemCpfFormatoinvalido()
    {
        $this->expectOutputString('CPF em formato inválido');
        new Cpf('111.111.111-11');
    }
}