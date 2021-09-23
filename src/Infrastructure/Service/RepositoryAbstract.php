<?php

namespace App\Infrastructure\Service;

use App\Domain\Repository\RepositoryInterface;
use Ds\Map;

abstract class RepositoryAbstract implements RepositoryInterface
{
    private Map $tipo;

    public function __construct(Map $tipo)
    {
        $this->tipo = $tipo;
    }

    public function getRepository(Map $tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function findAll(): Map
    {
        return $this->tipo;
    }

    public function find(int $id): Map
    {
        return $this->tipo->filter(function ($cpf, $value) use($id) {
            return $cpf === $id;
        });
    }

    public function findBy(array $condition): Map
    {
        return $this->tipo->filter(function ($cpf, $value) use($condition) {
           return in_array($condition[0], $value);
        });
    }
}