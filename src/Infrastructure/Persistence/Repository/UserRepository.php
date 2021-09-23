<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Infrastructure\Service\ContaAbstract;

class UserRepository extends \App\Infrastructure\Service\RepositoryAbstract implements
    \App\Domain\Factory\ContaFactoryInterface
{

    public function createConta(): ContaAbstract
    {
        // TODO: Implement createConta() method.
    }
}