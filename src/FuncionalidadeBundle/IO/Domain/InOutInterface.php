<?php

namespace App\FuncionalidadeBundle\IO\Domain;

interface InOutInterface
{
    /**
     * @param string $text
     *
     * This method is responsible for writing the text will appear in the console and capitalize the console value.
     */
    public function write(string $text): void;

    /**
     * @return string
     *
     * This method is responsible for retrieving the text that was captured in the write() method.
     */
    public function read(): string;

    /**
     * @param string $text
     * @return string
     *
     * This method is responsible for capturing the value and returning it directly.
     */
    public function wRead(string $text): string;
}