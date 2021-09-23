<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Infrastructure\Service\RepositoryAbstract;
use Ds\Map;

class UserRepository extends RepositoryAbstract
{
    public function __construct(Map $tipo)
    {
        parent::__construct($tipo);
    }
}