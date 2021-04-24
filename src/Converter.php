<?php

namespace Gfarias\PreviScraper;

class Converter
{
    /**
     * Convertir UF a Pesos Chilenos
     * "34,6" => 34.6.
     *
     * @param string $monto
     * @return float
     */
    public function UFtoFloat(string $monto): float
    {
        $monto = str_replace(',', '.', $monto);

        return floatval($monto);
    }

    /**
     * Convertir CLP a número
     * "234.568,34" => 234568.34.
     *
     * @param string $monto
     * @return float
     */
    public function CLPtoFloat(string $monto): float
    {
        $monto = str_replace('.', '', $monto);
        $monto = str_replace(',', '.', $monto);

        return floatval($monto);
    }

    /**
     * Convertir CLP a número
     * "234.568" => 234568.
     *
     * @param string $monto
     * @return float
     */
    public function CLPtoInt(string $monto): int
    {
        $monto = str_replace('.', '', $monto);

        return intval($monto);
    }

    /**
     * floatToString.
     *
     * @param  float $float
     * @param  int $decimals
     * @return string
     */
    public function floatToString(float $float, int $decimals = 2): string
    {
        return number_format($float, $decimals, ',', '.');
    }

    /**
     * intToString.
     *
     * @param  float $float
     * @param  int $decimals
     * @return string
     */
    public function intToString(int $int, int $decimals = 2): string
    {
        return number_format($int, $decimals, ',', '.');
    }
}
