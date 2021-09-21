<?php

namespace App\Action;

use App\Apresentation\CadastroPessoalView;
use App\Apresentation\IndexView;
use App\Apresentation\LoginView;
use App\FuncionalidadeBundle\ActionAbastract;
use App\Infrastructure\Entity\Banco;
use App\Infrastructure\Factory\Pessoa\PessoaConcrete;

class IndexAction extends ActionAbastract
{
    private Banco $myBank;
    private IndexView $indexView;

    public function __construct(
      Banco $myBank,
      IndexView $indexView
    ) {
        $this->myBank = $myBank;
        $this->indexView = $indexView;
    }

    public function __invoke(
        CadastroPessoalAction $cadastroPessoalAction,
        LoginAction $loginAction
    ) {

        $this->indexView->wTitulo('Sistema de Banco');
        $this->indexView->rTitulo();

        $this->indexView->conteudo(['0 - sair | ' . '1 - Cadastrar |' . ' 3 - acessar conta ']);

        $this->setOption((int)$this->indexView->read());

        switch ($this->getOption()) {
            case 1:
                $cadastroPessoalAction(
                    $this->myBank,
                    new CadastroPessoalView(),
                    new PessoaConcrete()
                );
            break;
            case 2:
                $loginAction(new LoginView());
                break;
            case 3:
                print_r($this->myBank->teste());
        }

    }
}