<?php

namespace App\FuncionalidadeBundle\IO;

use App\FuncionalidadeBundle\IO\Domain\InOutInterface;

/**
 * Create By Guilherme Fonseca Chaves
 * GitHub guiChaves637
 * email guilhermejr296@gmail.com
 */
class InOut implements InOutInterface
{
    /**
     * @var string
     */
    private string $write;

    /**
     * @param string $text
     *
     * This method is responsible for writing the text will appear in the console and capitalize the console value.
     */
    public function write(string $text): void
    {
        $this->write = readline($text);
    }

    /**
     * @return string
     *
     * This method is responsible for retrieving the text that was captured in the write() method.
     */
    public function read(): string
    {
        return $this->write;
    }

    /**
     * @param string $text
     * @return string
     *
     * This method is responsible for capturing the value and returning it directly.
     */
    public function wRead(string $text): string
    {
        $this->write($text);

        return $this->read();
    }
}