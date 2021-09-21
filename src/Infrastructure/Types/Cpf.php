<?php declare(strict_types=1);

namespace App\Infrastructure\Types;

use App\Infrastructure\Exception\CpfException;

class Cpf
{
    /**
     * @var string 
     */
    private string $cpf;

    /**
     * @var int
     */
    private int $numeroCpf;

    public function __construct(string $cpf)
    {
        try {
            if (!$this->validaCPF($cpf)) {
                throw new CpfException('O CPF informado é inválido');
            }
            
            $this->cpf = $cpf;
            $this->numeroCpf = (int)$this->extrairNumeros($cpf);
        } catch (CpfException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @return string
     */
    public function mostraCpf(): string
    {
        return $this->cpf;
    }

    /**
     * @return int
     */
    public function mostraNumero(): int
    {
        return $this->numeroCpf;
    }

    /**
     * @param $cpf
     * @return bool
     * @throws CpfException
     */
    private function validaCPF($cpf) {
        // Extrai somente os números
        $cpf = $this->extrairNumeros($cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            throw new CpfException('CPF precisa ter 11 digitos');
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            throw new CpfException('CPF em formato inválido');
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            
            $d = ((10 * $d) % 11) % 10;
            
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        
        return true;
    }

    private function extrairNumeros(string $cpf): string
    {
         return preg_replace( '/[^0-9]/is', '', $cpf );
    }
}