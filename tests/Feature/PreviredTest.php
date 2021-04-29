<?php

namespace Gfarias\PreviScraper\Tests\Feature;

use Gfarias\PreviScraper\PreviScraper;
use Gfarias\PreviScraper\Sources\Previred;
use Gfarias\PreviScraper\Tests\TestCase;
use Symfony\Component\DomCrawler\Crawler;

class PreviredTest extends TestCase
{
    public function testScraperIndicadores()
    {
        $previScraper = new PreviScraper();
        $indicadores = $previScraper->previred();
        $this->assertTrue($indicadores->getAfpCapital()->getPorcentajeSis() > 0);
        $this->assertTrue($indicadores->getAfpHabitat()->getPorcentajeIndependiente() > 0);
        $this->assertTrue($indicadores->getSeguroCesantia()->getIndefinidoTrabajador() > 0);
        $this->assertTrue($indicadores->getRentaTopeImponibleAfp() > 0);
    }

    public function testValoresIndicadores()
    {
        $filePath = dirname(__DIR__).DIRECTORY_SEPARATOR.'previred.html';
        $dom = new Crawler(file_get_contents($filePath));
        $previScraper = new Previred();
        $indicadores = $previScraper->setDom($dom)->setIndicators()->all();
        $this->assertEquals($this->getData(), $indicadores);
    }

    private function getData()
    {
        return [
            'uf' => 29494.13,
            'utm' => 51592,
            'rentaTopeImponibleAfp' => 81.6,
            'rentaTopeImponibleIps' => 60,
            'rentaTopeImponibleCesantia' => 122.6,
            'rentaMinimaImponibleDependiente' => 326500,
            'rentaMinimaImponibleMenores' => 243561,
            'rentaMinimaImponibleParticulares' => 326500,
            'topeApvMensual' => 50,
            'topeApvAnual' => 600,
            'cesantia' => [
                'indefinidoEmpleador' => 2.4,
                'indefinidoTrabajador' => 0.6,
                'plazoFijoEmpleador' => 3,
                'indefinidoSobre11Empleador' => 0.8,
                'casaParticularEmpleador' => 3,
            ],
            'afp' => [
                [
                    'nombre' => 'Capital',
                    'codigo' => 33,
                    'dependiente' => 11.44,
                    'dependienteSis' => 1.94,
                    'independiente' => 13.38,
                ], [
                    'nombre' => 'Cuprum',
                    'codigo' => 3,
                    'dependiente' => 11.44,
                    'dependienteSis' => 1.94,
                    'independiente' => 13.38,
                ], [
                    'nombre' => 'Habitat',
                    'codigo' => 05,
                    'dependiente' => 11.27,
                    'dependienteSis' => 1.94,
                    'independiente' => 13.21,
                ], [
                    'nombre' => 'PlanVital',
                    'codigo' => 29,
                    'dependiente' => 11.16,
                    'dependienteSis' => 1.94,
                    'independiente' => 13.1,
                ], [
                    'nombre' => 'ProVida',
                    'codigo' => 8,
                    'dependiente' => 11.45,
                    'dependienteSis' => 1.94,
                    'independiente' => 13.39,
                ], [
                    'nombre' => 'Modelo',
                    'codigo' => 34,
                    'dependiente' => 10.77,
                    'dependienteSis' => 1.94,
                    'independiente' => 12.71,
                ], [
                    'nombre' => 'Uno',
                    'codigo' => 35,
                    'dependiente' => 10.69,
                    'dependienteSis' => 1.94,
                    'independiente' => 12.63,
                ],
            ],
            'asignacionTramoAMonto' => 13401,
            'asignacionTramoBMonto' => 8224,
            'asignacionTramoCMonto' => 2599,
            'asignacionTramoA' => 342346,
            'asignacionTramoB' => 500033,
            'asignacionTramoC' => 779882,
            'asignacionTramoD' => 779882,
        ];
    }
}
