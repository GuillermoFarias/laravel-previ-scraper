<?php

namespace Gfarias\PreviScraper;

use Gfarias\PreviScraper\Sources\Previred;
use Gfarias\PreviScraper\Sources\Sii;

class PreviScraper
{
    private const ENERO = 'enero';
    private const FEBRERO = 'febrero';
    private const MARZO = 'marzo';
    private const ABRIL = 'abril';
    private const MAYO = 'mayo';
    private const JUNIO = 'junio';
    private const JULIO = 'julio';
    private const AGOSTO = 'agosto';
    private const SEPTIEMBRE = 'septiembre';
    private const OCTUBRE = 'octubre';
    private const NOVIEMBRE = 'noviembre';
    private const DICIEMBRE = 'diciembre';
    private const MESES = [
        1 => self::ENERO,
        2 => self::FEBRERO,
        3 => self::MARZO,
        4 => self::ABRIL,
        5 => self::MAYO,
        6 => self::JUNIO,
        7 => self::JULIO,
        8 => self::AGOSTO,
        9 => self::SEPTIEMBRE,
        10 => self::OCTUBRE,
        11 => self::NOVIEMBRE,
        12 => self::DICIEMBRE,
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

        if (!$month) {
            $month = intval(date('m'));
        }

        $month = self::MESES[$month];

        if (!$year) {
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
