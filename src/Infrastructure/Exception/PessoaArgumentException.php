<?php

namespace App\Infrastructure\Exception;

use Throwable;

class PessoaArgumentException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}