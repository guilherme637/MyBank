<?php

namespace App\Action;

use App\Apresentation\CadastroPessoalView;
use App\Apresentation\IndexView;
use App\Apresentation\LoginView;
use App\FuncionalidadeBundle\ActionAbastract;
use App\Infrastructure\Persistence\Banco;
use App\Infrastructure\Factory\Pessoa\PessoaConcrete;
use App\Infrastructure\Persistence\Repository\ContaRepository;
use App\Infrastructure\Persistence\Repository\UserRepository;

class IndexAction extends ActionAbastract
{
    private IndexView $indexView;

    private ContaRepository $contaRepository;

    private UserRepository $userRepository;

    public function __construct(
        IndexView $indexView,
        ContaRepository $contaRepository,
        UserRepository $userRepository
    ) {
        $this->indexView = $indexView;
        $this->contaRepository = $contaRepository;
        $this->userRepository = $userRepository;
    }

    public function __invoke(
        CadastroPessoalAction $cadastroPessoalAction,
        LoginAction $loginAction
    ) {
        do {
            if(empty($this->userRepository->findAll())) {
                $this->indexView->write('Deseja se cadastrar ?: ');
                $teste = $this->indexView->read();

                if ($this->indexView->read() == 1) {
                    $loginAction(new LoginView());
                }
            }
        } while (0 != $this->setOption((int)$this->indexView->read()));


        $this->indexView->wTitulo('Sistema de Banco');
        $this->indexView->rTitulo();

        $this->indexView->conteudo(['0 - sair | ' . '1 - Cadastrar |' . ' 3 - acessar conta ']);

        $this->setOption((int)$this->indexView->read());

        switch ($this->getOption()) {
            case 1:
                $cadastroPessoalAction(
                    $this->em,
                    new CadastroPessoalView(),
                    new PessoaConcrete()
                );
            break;
            case 2:
                $loginAction(new LoginView());
                break;
            case 3:
        }

    }
}