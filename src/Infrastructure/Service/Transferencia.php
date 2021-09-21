<?php

namespace App\Infrastructure\Service;

use App\Domain\Strategy\TransferenciaInterface;
use App\Infrastructure\Enum\TipoTransferenciaEnum;
use App\Infrastructure\Exception\ContaArgumentException;

class Transferencia
{
    /**
     * @param ContaAbstract $contaDto
     * @param ContaAbstract $destino
     * @param float $valor
     * @param TransferenciaInterface $tipoTransferencia
     * @throws ContaArgumentException
     */
    public function transferir(
        ContaAbstract $contaDto,
        ContaAbstract $destino,
        float $valor,
        TransferenciaInterface $tipoTransferencia
    ): void {
        $nome = $this->formataNome($tipoTransferencia);

        if ($contaDto->getSaldo() < $valor) {
            throw new ContaArgumentException('Operação não permitida');
        }

        if (
            (gmdate('N') == 7
            || gmdate('N') == 6)
            &&
            $this->isTedDoc($nome)
        ) {
            throw new ContaArgumentException(
                "Horário $nome: 06:30h às 22h, de segunda a sexta-feira"
            );
        }

        $contaDto->sacar($tipoTransferencia->juros($valor));
        $destino->depositar($valor);
    }

    /**
     * @param TransferenciaInterface $tipoTransferencia
     * @return string
     */
    private function formataNome(TransferenciaInterface $tipoTransferencia): string
    {
        $nomeClass = get_class($tipoTransferencia);
        $nomeStrategy = str_replace('App\\Infrastructure\\Strategy\\Transferencia\\', '', $nomeClass);

        return str_replace('Strategy', '', $nomeStrategy);
    }

    /**
     * @param string $nomeClasse
     * @return bool
     */
    private function isTedDoc(string $nomeClasse): bool
    {
        return $nomeClasse === TipoTransferenciaEnum::DOC
        || $nomeClasse === TipoTransferenciaEnum::TED;
    }
}