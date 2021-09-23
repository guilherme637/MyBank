<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Entity\UserInteraface;
use App\Infrastructure\Service\ContaAbstract;
use Ds\Map;

class Banco
{
    /**
     * @var Map
     */
    private Map $conta;

    /**
     * @var Map
     */
    private Map $user;

    public function __construct()
    {
        $this->conta = new Map();
        $this->user = new Map();
    }

    public function getConta(): Map
    {
        return $this->conta;
    }

    public function getUser(): Map
    {
        return $this->user;
    }

    public function addNewConta(int $cpf, ContaAbstract $conta): void
    {
        $this->conta->put($cpf, $conta);
    }

    public function addNewUser(int $cpf, UserInteraface $user)
    {
        $this->user->put($cpf, $user);
    }
}