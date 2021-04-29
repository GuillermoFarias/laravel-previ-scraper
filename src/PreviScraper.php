<?php

namespace Gfarias\PreviScraper;

use Carbon\Carbon;
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
    public function siiFromPeriod(int $month, int $year): Sii
    {
        $sii = new Sii();
        $month = self::MESES[$month];
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
        $month = self::MESES[intval(Carbon::now()->format('m'))];
        $year = Carbon::now()->format('Y');
        return $sii->setPeriod($month, $year);
    }
}
