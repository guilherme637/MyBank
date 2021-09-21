<?php

namespace App\Action;

use App\Apresentation\CadastroPessoalView;
use App\FuncionalidadeBundle\ActionAbastract;
use App\Infrastructure\{Entity\Banco, Enum\TipoContaEnum, Types\Cpf};
use App\Infrastructure\Dto\{ContaCorrenteDto, ContaPoupancaDto, PessoaDto};
use App\Infrastructure\Factory\{Conta\Corrente\CorrenteConcrete,
    Conta\Poupanca\PoupancaConcrete,
    Pessoa\PessoaCreatorAbstract};

class CadastroPessoalAction extends ActionAbastract
{
    private CorrenteConcrete $correnteConcrete;
    private PoupancaConcrete $poupancaConcrete;

    public function __construct()
    {
        $this->correnteConcrete = new CorrenteConcrete();
        $this->poupancaConcrete = new PoupancaConcrete();
    }

    public function __invoke(
        Banco $banco,
        CadastroPessoalView $cadastroPessoalView,
        PessoaCreatorAbstract $pessoaFactory,
    ): void {
        $cadastroPessoalView->wTitulo("\n\n\t\t Cadastro Pessoal \n\n");
        $cadastroPessoalView->rTitulo();

        $cadastroPessoalView->conteudo([
            '| 1 - Conta Corrente | 2 - Conta Poupanca | ',
            'Digite seu nome: ',
            'Digite seu CPF: '
       ]);

        $pessoa = $pessoaFactory->create(
            new PessoaDto($cadastroPessoalView->values()->nome, new Cpf($cadastroPessoalView->values()->cpf))
        )->pessoa();

        if ($cadastroPessoalView->values()->tipoConta === TipoContaEnum::CORRENTE) {
            $corrente = new ContaCorrenteDto($pessoa, 1111, rand(10000, 90000));
            $conta = $this->correnteConcrete->createTypeConta($corrente)->createConta();
        } else {
            $poupanca = new ContaPoupancaDto($pessoa, 1111, rand(10000, 90000));
            $conta = $this->poupancaConcrete->createTypeConta($poupanca)->createConta();
        }

        $banco->addNewConta($pessoa->mostrarNumeroCpf(), $conta);
    }
}