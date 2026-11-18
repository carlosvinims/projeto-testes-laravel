<?php

namespace App\Services;

use InvalidArgumentException;

class CalculadoraDescontoService
{
    public function calcular(float $valorCompra, bool $isVip = false): float
    {
        if ($valorCompra <= 0) {
            throw new InvalidArgumentException('O valor de compar deve ser maior que zero.');
        }

        $percentualDesconto = 0.0;

        if ($valorCompra >= 500.00) {
            $percentualDesconto = 0.20;
        } elseif ($valorCompra >= 100.00) {
            $percentualDesconto = 0.10;
        }

        if ($isVip) {
            $percentualDesconto += 0.05;
        }

        $valorDesconto = $valorCompra * $percentualDesconto;

        return round($valorCompra - $valorDesconto, 2);
    }
}