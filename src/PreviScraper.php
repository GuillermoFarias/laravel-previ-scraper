<?php

namespace Gfarias\PreviScraper;

use Gfarias\PreviScraper\Sources\Previred;
use Gfarias\PreviScraper\Sources\Sii;

class PreviScraper
{
    private const MESES = [
        1 => 'enero',
        2 => 'febrero',
        3 => 'marzo',
        4 => 'abril',
        5 => 'mayo',
        6 => 'junio',
        7 => 'julio',
        8 => 'agosto',
        9 => 'septiembre',
        10 => 'octubre',
        11 => 'noviembre',
        12 => 'diciembre',
    ];

    /**
     * getPrevired.
     *
     * @return \Gfarias\PreviScraper\Sources\Previred
     */
    public function previred(): Previred
    {
        $previred = new Previred();

        return $previred->setIndicators();
    }

    /**
     * obtener indicadores de Sii de un periodo específico pasando año y mes.
     *
     * @param  string $month
     * @param  int $year
     * @return \Gfarias\PreviScraper\Sources\Sii
     */
    public function siiFromPeriod(int $month = null, int $year = null): Sii
    {
        $sii = new Sii();

        if (! $month) {
            $month = intval(date('m'));
        }

        $month = self::MESES[$month];

        if (! $year) {
            $year = date('Y');
        }

        return $sii->setPeriod($month, $year);
    }

    /**
     * obtener indicadores de Sii del periodo actual.
     *
     * @return \Gfarias\PreviScraper\Sources\Sii
     */
    public function sii(): Sii
    {
        $sii = new Sii();
        $month = self::MESES[intval(date('m'))];
        $year = date('Y');

        return $sii->setPeriod($month, $year);
    }
}
