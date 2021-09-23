<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Service\RepositoryAbstract;
use Ds\Map;

class ContaRepository extends RepositoryAbstract
{
    public function __construct(Map $tipo)
    {
        parent::__construct($tipo);
    }
}