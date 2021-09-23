<?php

namespace App\Domain\Repository;

use Ds\Map;
use phpDocumentor\Reflection\Types\Collection;

interface RepositoryInterface
{
    public function findAll(): Map;

    public function find(int $id): Map;

    public function findBy(array $condition): Map;
}