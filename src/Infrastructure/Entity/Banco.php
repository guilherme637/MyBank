<?php

namespace App\Infrastructure\Entity;

use App\Infrastructure\Service\ContaAbstract;
use Ds\Collection;
use Ds\Map;

class Banco
{
    /**
     * @var Map
     */
    private Map $conta;

    public function __construct()
    {
        $this->conta = new Map();
    }

    public function addNewConta(int $cpf, ContaAbstract $conta): void
    {
        $this->conta->put($cpf, $conta);
    }

    public function findBy(array $condition): Collection
    {
        return $this->conta->filter(function ($cpf, $conta) {
            print_r($conta);
        });
    }

    public function teste()
    {
        return $this->conta;
    }
}