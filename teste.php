<?php

use App\Action\CadastroPessoalAction;
use App\Action\IndexAction;
use App\Action\LoginAction;
use App\Apresentation\IndexView;
use App\Infrastructure\Persistence\Banco;
use App\Infrastructure\Persistence\Repository\ContaRepository;
use App\Infrastructure\Persistence\Repository\UserRepository;

require_once 'vendor/autoload.php';

$em = new Banco();

$index = new IndexAction(new IndexView(), new ContaRepository($em->getConta()), new UserRepository($em->getUser()));
$opacao = '';

do {
    try {
        $index(new CadastroPessoalAction(), new LoginAction());
        $opacao = $index->getOption();
    } catch (Throwable $e) {
        echo "\n\n\n";
        echo '__---.:: ' . $e->getMessage() . ' ::.---___';
        echo "\n\n\n";

    }
} while ($opacao != 0);



















//function criarConta(Banco $banco, CadastroPessoalView $inOut) {
//        if ($opacao == 3) {
//        if ($banco->listConta()->isEmpty()) {
//            do {
//                echo "\n\n\t\t .::Nenhum registro encontrado::. \n";
//                echo "\n\n Deseja adicionar uma nova conta bancaria ?\n ";
//                $opacao2 = $->wRead('(TransferenciaInterface/N): ');
//                if (strtoupper($opacao2) === 'TransferenciaInterface') {
//                    criarConta($banco, $inOut);
//                    $opacao2 = 'N';
//                }
//            } while (strtoupper($opacao2) != 'N');
//        }
//
//        print_r($banco->listConta());
//    }
//    try {
//        $inOut->wTitulo("\n\n\t\t Castro Pessoal \n\n");
//        $inOut->rTitulo();
//
//        $inOut->conteudo(['Digite seu nome: ', 'Digite seu CPF: ']);
//
//        $pessoa = new Pessoa(new Nome($inOut->values()->nome), new Cpf($inOut->values()->cpf));
//
//        $geraConta = rand(10000, 90000);
//        echo "\n\n\t\t Conta criada com sucesso: agência: 1111 e conta: $geraConta \n\n";
//
//        $corrente = new ContaCorrenteDto($pessoa, '1111', rand(10000, 90000));
//        $banco->addNewConta($corrente, new CorrenteConcrete());
//
//        echo "\n\n\t\t Conta Corrente criada com sucesso \n";
//    } catch (Exception $exception) {
//        echo $exception->getMessage();
//    }
//}