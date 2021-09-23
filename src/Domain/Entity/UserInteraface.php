<?php

namespace App\Domain\Entity;

interface UserInteraface
{
    public function getUsername(): int;

    /**
     * @return int
     */
    public function getPassword(): int;
}