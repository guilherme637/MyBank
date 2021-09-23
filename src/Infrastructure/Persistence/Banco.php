<?php

namespace App\Infrastructure\Data;

use App\Domain\Entity\UserInteraface;
use App\Infrastructure\Service\ContaAbstract;
use Ds\Collection;
use Ds\Map;

class Banco
{
    /**
     * @var Map
     */
    private Map $conta;

    private Map $user;

    public function __construct()
    {
        $this->conta = new Map();
        $this->user = new Map();
    }

    public function addNewConta(int $cpf, ContaAbstract $conta): void
    {
        $this->conta->put($cpf, $conta);
    }

    public function addNewUser(int $cpf, UserInteraface $user)
    {
        $this->user->put($cpf, $user);
    }

    public function findBy(int $condition): Collection
    {
        return $this->conta->filter(function ($cpf, $conta) use ($condition) {
            return $conta === $condition;
        });
    }
}