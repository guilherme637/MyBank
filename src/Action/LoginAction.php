<?php

namespace App\Action;

use App\Apresentation\LoginView;
use App\FuncionalidadeBundle\ActionAbastract;

class LoginAction extends ActionAbastract
{
    public function __invoke(LoginView $loginView)
    {
        $loginView->wTitulo('Autenticacao');
        $loginView->rTitulo();

        $loginView->conteudo(['CPF: ', 'senha: ']);
    }
}