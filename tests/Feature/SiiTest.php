<?php

namespace Gfarias\PreviScraper\Tests\Feature;

use Carbon\Carbon;
use Exception;
use Gfarias\PreviScraper\PreviScraper;
use Gfarias\PreviScraper\Tests\TestCase;

class SiiTest extends TestCase
{
    public function testIndicadoresDesdePeriodo()
    {
        $previScraper = new PreviScraper();
        $indicadores = $previScraper->siiFromPeriod(1, 2021)->all();
        $this->assertEquals($this->getData(), $indicadores);
    }

    public function testIndicadores()
    {
        $knownDate = Carbon::create(2021, 1);
        Carbon::setTestNow($knownDate);
        $previScraper = new PreviScraper();
        $indicadores = $previScraper->sii()->all();
        $this->assertEquals($this->getData(), $indicadores);
    }

    public function testIndicadoresException()
    {
        $this->expectException(Exception::class);
        $previScraper = new PreviScraper();
        $previScraper->siiFromPeriod(1, 0)->all();
    }

    private function getData()
    {
        return [
            'mensual' => [
                [
                    'periodo' => 'mensual',
                    'desde' => 0.0,
                    'hasta' => 688203.0,
                    'factor' => 0.0,
                    'descuento' => 0.0,
                    'impuesto' => 0.0,
                ], [
                    'periodo' => 'mensual',
                    'desde' => 688203.01,
                    'hasta' => 1529340.0,
                    'factor' => 0.04,
                    'descuento' => 27528.12,
                    'impuesto' => 2.2,
                ], [
                    'periodo' => 'mensual',
                    'desde' => 1529340.01,
                    'hasta' => 2548900.0,
                    'factor' => 0.08,
                    'descuento' => 88701.72,
                    'impuesto' => 4.52,
                ], [
                    'periodo' => 'mensual',
                    'desde' => 2548900.01,
                    'hasta' => 3568460.0,
                    'factor' => 0.135,
                    'descuento' => 228891.22,
                    'impuesto' => 7.09,
                ], [
                    'periodo' => 'mensual',
                    'desde' => 3568460.01,
                    'hasta' => 4588020.0,
                    'factor' => 0.23,
                    'descuento' => 567894.92,
                    'impuesto' => 10.62,
                ], [
                    'periodo' => 'mensual',
                    'desde' => 4588020.01,
                    'hasta' => 6117360.0,
                    'factor' => 0.304,
                    'descuento' => 907408.4,
                    'impuesto' => 15.57,
                ], [
                    'periodo' => 'mensual',
                    'desde' => 6117360.01,
                    'hasta' => 15803180.0,
                    'factor' => 0.35,
                    'descuento' => 1188806.96,
                    'impuesto' => 27.48,
                ], [
                    'periodo' => 'mensual',
                    'desde' => 15803180.01,
                    'hasta' => 0.0,
                    'factor' => 0.4,
                    'descuento' => 1978965.96,
                    'impuesto' => 27.48,
                ],
            ],
            'quincenal' => [
                [
                    'periodo' => 'quincenal',
                    'desde' => 0.0,
                    'hasta' => 344101.5,
                    'factor' => 0.0,
                    'descuento' => 0.0,
                    'impuesto' => 0.0,
                ], [
                    'periodo' => 'quincenal',
                    'desde' => 344101.51,
                    'hasta' => 764670.0,
                    'factor' => 0.04,
                    'descuento' => 13764.06,
                    'impuesto' => 2.2,
                ], [
                    'periodo' => 'quincenal',
                    'desde' => 764670.01,
                    'hasta' => 1274450.0,
                    'factor' => 0.08,
                    'descuento' => 44350.86,
                    'impuesto' => 4.52,
                ], [
                    'periodo' => 'quincenal',
                    'desde' => 1274450.01,
                    'hasta' => 1784230.0,
                    'factor' => 0.135,
                    'descuento' => 114445.61,
                    'impuesto' => 7.09,
                ], [
                    'periodo' => 'quincenal',
                    'desde' => 1784230.01,
                    'hasta' => 2294010.0,
                    'factor' => 0.23,
                    'descuento' => 283947.46,
                    'impuesto' => 10.62,
                ], [
                    'periodo' => 'quincenal',
                    'desde' => 2294010.01,
                    'hasta' => 3058680.0,
                    'factor' => 0.304,
                    'descuento' => 453704.2,
                    'impuesto' => 15.57,
                ], [
                    'periodo' => 'quincenal',
                    'desde' => 3058680.01,
                    'hasta' => 7901590.0,
                    'factor' => 0.35,
                    'descuento' => 594403.48,
                    'impuesto' => 27.48,
                ], [
                    'periodo' => 'quincenal',
                    'desde' => 7901590.01,
                    'hasta' => 0.0,
                    'factor' => 0.4,
                    'descuento' => 989482.98,
                    'impuesto' => 27.48,
                ],
            ],
            'semanal' => [
                [
                    'periodo' => 'semanal',
                    'desde' => 0.0,
                    'hasta' => 160580.75,
                    'factor' => 0.0,
                    'descuento' => 0.0,
                    'impuesto' => 0.0,
                ], [
                    'periodo' => 'semanal',
                    'desde' => 160580.76,
                    'hasta' => 356846.1,
                    'factor' => 0.04,
                    'descuento' => 6423.23,
                    'impuesto' => 2.2,
                ], [
                    'periodo' => 'semanal',
                    'desde' => 356846.11,
                    'hasta' => 594743.5,
                    'factor' => 0.08,
                    'descuento' => 20697.07,
                    'impuesto' => 4.52,
                ], [
                    'periodo' => 'semanal',
                    'desde' => 594743.51,
                    'hasta' => 832640.9,
                    'factor' => 0.135,
                    'descuento' => 53407.97,
                    'impuesto' => 7.09,
                ], [
                    'periodo' => 'semanal',
                    'desde' => 832640.91,
                    'hasta' => 1070538.3,
                    'factor' => 0.23,
                    'descuento' => 132508.85,
                    'impuesto' => 10.62,
                ], [
                    'periodo' => 'semanal',
                    'desde' => 1070538.31,
                    'hasta' => 1427384.4,
                    'factor' => 0.304,
                    'descuento' => 211728.69,
                    'impuesto' => 15.57,
                ], [
                    'periodo' => 'semanal',
                    'desde' => 1427384.41,
                    'hasta' => 3687409.7,
                    'factor' => 0.35,
                    'descuento' => 277388.37,
                    'impuesto' => 27.48,
                ], [
                    'periodo' => 'semanal',
                    'desde' => 3687409.71,
                    'hasta' => 0.0,
                    'factor' => 0.4,
                    'descuento' => 461758.85,
                    'impuesto' => 27.48,
                ],
            ],
            'diario' => [
                [
                    'periodo' => 'diario',
                    'desde' => 0.0,
                    'hasta' => 22940.15,
                    'factor' => 0.0,
                    'descuento' => 0.0,
                    'impuesto' => 0.0,
                ], [
                    'periodo' => 'diario',
                    'desde' => 22940.16,
                    'hasta' => 50978.1,
                    'factor' => 0.04,
                    'descuento' => 917.61,
                    'impuesto' => 2.2,
                ], [
                    'periodo' => 'diario',
                    'desde' => 50978.11,
                    'hasta' => 84963.5,
                    'factor' => 0.08,
                    'descuento' => 2956.73,
                    'impuesto' => 4.52,
                ], [
                    'periodo' => 'diario',
                    'desde' => 84963.51,
                    'hasta' => 118948.9,
                    'factor' => 0.135,
                    'descuento' => 7629.72,
                    'impuesto' => 7.09,
                ], [
                    'periodo' => 'diario',
                    'desde' => 118948.91,
                    'hasta' => 152934.3,
                    'factor' => 0.23,
                    'descuento' => 18929.87,
                    'impuesto' => 10.62,
                ], [
                    'periodo' => 'diario',
                    'desde' => 152934.31,
                    'hasta' => 203912.4,
                    'factor' => 0.304,
                    'descuento' => 30247.01,
                    'impuesto' => 15.57,
                ], [
                    'periodo' => 'diario',
                    'desde' => 203912.41,
                    'hasta' => 526773.7,
                    'factor' => 0.35,
                    'descuento' => 39626.98,
                    'impuesto' => 27.48,
                ],

            ],
        ];
    }
}
