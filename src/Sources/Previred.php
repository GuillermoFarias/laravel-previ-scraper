<?php

namespace Gfarias\PreviService\Sources;

use Gfarias\PreviService\Supports\AfpSupport;

class Previred extends AbstractSource
{
    protected $url = 'https://www.previred.com/web/previred/indicadores-previsionales';

    private $uf = '';
    private $utm = '';

    // Rentas
    private $rentaTopeImponibleAfp = '';
    private $rentaTopeImponibleIps = '';
    private $rentaTopeImponibleCesantia = '';
    private $rentaMinimaImponibleDependiente = '';
    private $rentaMinimaImponibleMenores = '';
    private $rentaMinimaImponibleParticulares = '';

    // Cesantia
    private $seguroCesantia = [];

    // APV
    private $topeApvMensual = '';
    private $topeApvAnual = '';

    // AFP
    private $afpCapital = null;
    private $afpCuprum = null;
    private $afpHabitat = null;
    private $afpPlanVital = null;
    private $afpProVida = null;
    private $afpModelo = null;
    private $afpUno = null;

    // asignación familiar
    private $asignacionTramoAMonto = '';
    private $asignacionTramoBMonto = '';
    private $asignacionTramoCMonto = '';
    private $asignacionTramoA = '';
    private $asignacionTramoB = '';
    private $asignacionTramoC = '';
    private $asignacionTramoD = '';

    /**
     * setear indicadores.
     *
     * @return \Gfarias\PreviService\Sources\Previred
     */
    public function setIndicators(): Previred
    {
        $this->dom = $this->client->request('GET', $this->url);
        $this->setUF();
        $this->setUTM();
        $this->setRentaTopeImponibleAfp();
        $this->setRentaTopeImponibleIps();
        $this->setRentaTopeImponibleCesantia();
        $this->setRentaMinimaImponibleDependiente();
        $this->setRentaMinimaImponibleMenores();
        $this->setRentaMinimaImponibleParticulares();
        $this->setTopeAPVMensual();
        $this->setTopeAPVAnual();
        $this->setSeguroCesantia();
        $this->setAfpCapital();
        $this->setAfpCuprum();
        $this->setAfpHabitat();
        $this->setAfpPlanVital();
        $this->setAfpProVida();
        $this->setAfpModelo();
        $this->setAfpUno();
        $this->setAsignacionTramoAMonto();
        $this->setAsignacionTramoBMonto();
        $this->setAsignacionTramoCMonto();
        $this->setAsignacionTramoA();
        $this->setAsignacionTramoB();
        $this->setAsignacionTramoC();
        $this->setAsignacionTramoD();

        return $this;
    }

    /**
     * get UF as string.
     *
     * @return float
     */
    public function getUF(): float
    {
        return $this->converter->CLPtoFloat($this->uf);
    }

    /**
     * Set the value of UF.
     */
    public function setUF(): void
    {
        $tabla = $this->dom->filter('table')->eq(0);
        $valor = $tabla->filter('td')->getNode(2)->textContent;
        $this->uf = $this->getCLPFromText($valor);
    }

    /**
     * get Utm as string.
     *
     * @return float
     */
    public function getUTM(): float
    {
        return $this->converter->CLPtoFloat($this->utm);
    }

    /**
     * Set the value of UTM.
     */
    public function setUTM(): void
    {
        $tabla = $this->dom->filter('table')->eq(1);
        $valor = $tabla->filter('td')->getNode(4)->textContent;
        $this->utm = $this->getCLPFromText($valor);
    }

    /**
     * get rentaTopeImponibleAfp as float.
     *
     * @return string
     */
    public function getRentaTopeImponibleAfp(): float
    {
        return $this->converter->UFtoFloat($this->rentaTopeImponibleAfp);
    }

    /**
     * Set the value of rentaTopeImponibleAfp.
     *
     * @return void
     */
    public function setRentaTopeImponibleAfp(): void
    {
        $tabla = $this->dom->filter('table')->eq(2);
        $valor = $tabla->filter('td')->getNode(1)->textContent;
        $this->rentaTopeImponibleAfp = $this->getUFFromText($valor);
    }

    /**
     * get getRentaTopeImponibleIps as float.
     *
     * @return string
     */
    public function getRentaTopeImponibleIps(): float
    {
        return $this->converter->UFtoFloat($this->rentaTopeImponibleIps);
    }

    /**
     * Set the value of rentaTopeImponibleIps.
     *
     * @return void
     */
    public function setRentaTopeImponibleIps(): void
    {
        $tabla = $this->dom->filter('table')->eq(2);
        $valor = $tabla->filter('td')->getNode(3)->textContent;
        $this->rentaTopeImponibleIps = $this->getUFFromText($valor);
    }

    /**
     * get getRentaTopeImponibleCesantia as float.
     *
     * @return float
     */
    public function getRentaTopeImponibleCesantia(): float
    {
        return $this->converter->UFtoFloat($this->rentaTopeImponibleCesantia);
    }

    /**
     * set indicator.
     *
     * @return void
     */
    public function setRentaTopeImponibleCesantia(): void
    {
        $tabla = $this->dom->filter('table')->eq(2);
        $valor = $tabla->filter('td')->getNode(5)->textContent;
        $this->rentaTopeImponibleCesantia = $this->getUFFromText($valor);
    }

    /**
     * Get the value of rentaMinimaImponibleDependiente.
     *
     * @return float
     */
    public function getRentaMinimaImponibleDependiente(): float
    {
        return $this->converter->CLPtoFloat($this->rentaMinimaImponibleDependiente);
    }

    /**
     * Set the value of rentaMinimaImponibleDependiente.
     *
     * @return void
     */
    public function setRentaMinimaImponibleDependiente(): void
    {
        $tabla = $this->dom->filter('table')->eq(3);
        $valor = $tabla->filter('td')->getNode(2)->textContent;
        $this->rentaMinimaImponibleDependiente = $this->getCLPFromText($valor);
    }

    /**
     * Get the value of rentaMinimaImponibleMenores.
     *
     * @return float
     */
    public function getRentaMinimaImponibleMenores(): float
    {
        return $this->converter->CLPtoFloat($this->rentaMinimaImponibleMenores);
    }

    /**
     * Set the value of rentaMinimaImponibleMenores.
     *
     * @return void
     */
    public function setRentaMinimaImponibleMenores(): void
    {
        $tabla = $this->dom->filter('table')->eq(3);
        $valor = $tabla->filter('td')->getNode(4)->textContent;
        $this->rentaMinimaImponibleMenores = $this->getCLPFromText($valor);
    }

    /**
     * getRentaMinimaImponibleParticulares.
     *
     * @return float
     */
    public function getRentaMinimaImponibleParticulares(): float
    {
        return $this->converter->CLPtoFloat($this->rentaMinimaImponibleParticulares);
    }

    /**
     * Set the value of rentaMinimaImponibleParticulares.
     *
     * @return void
     */
    public function setRentaMinimaImponibleParticulares(): void
    {
        $tabla = $this->dom->filter('table')->eq(3);
        $valor = $tabla->filter('td')->getNode(6)->textContent;
        $this->rentaMinimaImponibleParticulares = $this->getCLPFromText($valor);
    }

    /**
     * Set the value of cesantia.
     *
     * @return void
     */
    public function setSeguroCesantia(): void
    {
        $tabla = $this->dom->filter('table')->eq(6);
        $indicadores = [
            'indefinido_empleador' => $this->converter->UFtoFloat(
                $this->getUFFromText($tabla->filter('td')->getNode(6)->textContent)
            ),
            'indefinido_trabajador' => $this->converter->UFtoFloat(
                $this->getUFFromText($tabla->filter('td')->getNode(7)->textContent)
            ),
            'plazo_fijo_empleador' => $this->converter->UFtoFloat(
                $this->getUFFromText($tabla->filter('td')->getNode(9)->textContent)
            ),
            'indefinido_sobre_11_empleador' => $this->converter->UFtoFloat(
                $this->getUFFromText($tabla->filter('td')->getNode(12)->textContent)
            ),
            'casa_particular_empleador' => $this->converter->UFtoFloat(
                $this->getUFFromText($tabla->filter('td')->getNode(15)->textContent)
            ),
        ];
        $this->seguroCesantia = $indicadores;
    }

    /**
     * get SeguroCesantia.
     *
     * @return array
     */
    public function getSeguroCesantia(): array
    {
        return $this->seguroCesantia;
    }

    /**
     * get TopeApvMensual.
     *
     * @return float
     */
    public function getTopeApvMensual(): float
    {
        return $this->converter->UFtoFloat($this->topeApvMensual);
    }

    /**
     * Set the value of topeAPVMensual.
     *
     * @return void
     */
    public function setTopeApvMensual(): void
    {
        $tabla = $this->dom->filter('table')->eq(4);
        $valor = $tabla->filter('td')->getNode(1)->textContent;
        $this->topeApvMensual = $this->getUFFromText($valor);
    }

    /**
     * Get the value of topeApvAnual.
     *
     * @return float
     */
    public function getTopeAPVAnual(): float
    {
        return $this->converter->UFtoFloat($this->topeApvAnual);
    }

    /**
     * Set the value of topeApvAnual.
     *
     * @return void
     */
    public function setTopeAPVAnual(): void
    {
        $tabla = $this->dom->filter('table')->eq(4);
        $valor = $tabla->filter('td')->getNode(3)->textContent;
        $this->topeApvAnual = $this->getUFFromText($valor);
    }

    /**
     * Get the value of afpCapital.
     *
     * @return \Gfarias\PreviService\Supports\AfpSupport
     */
    public function getAfpCapital(): AfpSupport
    {
        return $this->afpCapital;
    }

    /**
     * Set the value of afpCapital.
     *
     * @return  self
     */
    public function setAfpCapital(): void
    {
        $this->afpCapital = $this->getAfp(AfpSupport::CODE_CAPITAL, 4);
    }

    /**
     * Get the value of afpCuprum.
     *
     * @return \Gfarias\PreviService\Supports\AfpSupport
     */
    public function getAfpCuprum(): AfpSupport
    {
        return $this->afpCuprum;
    }

    /**
     * Set the value of afpCuprum.
     *
     * @return void
     */
    public function setAfpCuprum(): void
    {
        $this->afpCuprum = $this->getAfp(AfpSupport::CODE_CUPRUM, 5);
    }

    /**
     * Get the value of afpHabitat.
     *
     * @return \Gfarias\PreviService\Supports\AfpSupport
     */
    public function getAfpHabitat(): AfpSupport
    {
        return $this->afpHabitat;
    }

    /**
     * Set the value of afpHabitat.
     *
     * @return void
     */
    public function setAfpHabitat(): void
    {
        $this->afpHabitat = $this->getAfp(AfpSupport::CODE_HABITAT, 6);
    }

    /**
     * Get the value of afpPlanVital.
     *
     * @return \Gfarias\PreviService\Supports\AfpSupport
     */
    public function getAfpPlanVital(): AfpSupport
    {
        return $this->afpPlanVital;
    }

    /**
     * Set the value of afpPlanVital.
     *
     * @return void
     */
    public function setAfpPlanVital(): void
    {
        $this->afpPlanVital = $this->getAfp(AfpSupport::CODE_PLANVITAL, 7);
    }

    /**
     * Get the value of afpProVida.
     *
     * @return \Gfarias\PreviService\Supports\AfpSupport
     */
    public function getAfpProVida(): AfpSupport
    {
        return $this->afpProVida;
    }

    /**
     * Set the value of afpProVida.
     *
     * @return void
     */
    public function setAfpProVida(): void
    {
        $this->afpProVida = $this->getAfp(AfpSupport::CODE_PROVIDA, 8);
    }

    /**
     * Get the value of afpModelo.
     *
     * @return \Gfarias\PreviService\Supports\AfpSupport
     */
    public function getAfpModelo(): AfpSupport
    {
        return $this->afpModelo;
    }

    /**
     * Set the value of afpModelo.
     *
     * @return void
     */
    public function setAfpModelo(): void
    {
        $this->afpModelo = $this->getAfp(AfpSupport::CODE_MODELO, 9);
    }

    /**
     * Get the value of afpUno.
     *
     * @return \Gfarias\PreviService\Supports\AfpSupport
     */
    public function getAfpUno(): AfpSupport
    {
        return $this->afpUno;
    }

    /**
     * Set the value of afpUno.
     *
     * @return void
     */
    public function setAfpUno(): void
    {
        $this->afpUno = $this->getAfp(AfpSupport::CODE_UNO, 10);
    }

    /**
     * Get the value of asignacionTramoAMonto.
     */
    public function getAsignacionTramoAMonto(): float
    {
        return $this->converter->CLPtoFloat($this->asignacionTramoAMonto);
    }

    /**
     * Set the value of asignacionTramoAMonto.
     *
     * @return void
     */
    public function setAsignacionTramoAMonto(): void
    {
        $tabla = $this->dom->filter('table')->eq(8);
        $valor = $tabla->filter('td')->getNode(5)->textContent;
        $this->asignacionTramoAMonto = $this->getCLPFromText($valor);
    }

    /**
     * Get the value of asignacionTramoBMonto.
     */
    public function getAsignacionTramoBMonto(): float
    {
        return $this->converter->CLPtoFloat($this->asignacionTramoBMonto);
    }

    /**
     * Set the value of asignacionTramoBMonto.
     *
     * @return void
     */
    public function setAsignacionTramoBMonto(): void
    {
        $tabla = $this->dom->filter('table')->eq(8);
        $valor = $tabla->filter('td')->getNode(8)->textContent;
        $this->asignacionTramoBMonto = $this->getCLPFromText($valor);
    }

    /**
     * Get the value of asignacionTramoCMonto.
     */
    public function getAsignacionTramoCMonto(): float
    {
        return $this->converter->CLPtoFloat($this->asignacionTramoCMonto);
    }

    /**
     * Set the value of asignacionTramoCMonto.
     *
     * @return void
     */
    public function setAsignacionTramoCMonto(): void
    {
        $tabla = $this->dom->filter('table')->eq(8);
        $valor = $tabla->filter('td')->getNode(11)->textContent;
        $this->asignacionTramoCMonto = $this->getCLPFromText($valor);
    }

    /**
     * Get the value of asignacionTramoA.
     */
    public function getAsignacionTramoA(): float
    {
        return $this->converter->CLPtoFloat($this->asignacionTramoA);
    }

    /**
     * Set the value of asignacionTramoA.
     *
     * @return void
     */
    public function setAsignacionTramoA(): void
    {
        $tabla = $this->dom->filter('table')->eq(8);
        $valor = $tabla->filter('td')->getNode(6)->textContent;
        $this->asignacionTramoA = $this->getCLPFromText($valor);
    }

    /**
     * Get the value of asignacionTramoB.
     *
     * @return string
     */
    public function getAsignacionTramoB(): float
    {
        return $this->converter->CLPtoFloat($this->asignacionTramoB);
    }

    /**
     * Set the value of asignacionTramoB.
     *
     * @return  self
     */
    public function setAsignacionTramoB()
    {
        $tabla = $this->dom->filter('table')->eq(8);
        $valor = $tabla->filter('td')->getNode(9)->textContent;
        $this->asignacionTramoB = $this->getAllCLPFromText($valor)[1];
    }

    /**
     * Get the value of asignacionTramoC.
     *
     * @return float
     */
    public function getAsignacionTramoC(): float
    {
        return $this->converter->CLPtoFloat($this->asignacionTramoC);
    }

    /**
     * Set the value of asignacionTramoC.
     *
     * @return void
     */
    public function setAsignacionTramoC(): void
    {
        $tabla = $this->dom->filter('table')->eq(8);
        $valor = $tabla->filter('td')->getNode(12)->textContent;
        $this->asignacionTramoC = $this->getAllCLPFromText($valor)[1];
    }

    /**
     * Get the value of asignacionTramoD.
     *
     * @return float
     */
    public function getAsignacionTramoD(): float
    {
        return $this->converter->CLPtoFloat($this->asignacionTramoD);
    }

    /**
     * Set the value of asignacionTramoD.
     *
     * @return void
     */
    public function setAsignacionTramoD(): void
    {
        $tabla = $this->dom->filter('table')->eq(8);
        $valor = $tabla->filter('td')->getNode(15)->textContent;
        $this->asignacionTramoD = $this->getCLPFromText($valor);
    }

    /**
     * generar afp support.
     *
     * @param string $codigo
     * @param int $trIndex
     * @return \Gfarias\PreviService\Supports\AfpSupport
     */
    private function getAfp(string $codigo, int $trIndex): AfpSupport
    {
        $tabla = $this->dom->filter('table')->eq(7);
        $tr = $tabla->filter('tr')->eq($trIndex);
        $nombreAfp = $tr->filter('td')->getNode(0)->textContent;
        $dependiente = $this->converter->UFtoFloat($this->getUFFromText($tr->filter('td')->getNode(1)->textContent));
        $dependienteSis = $this->converter->UFtoFloat($this->getUFFromText($tr->filter('td')->getNode(2)->textContent));
        $independiente = $this->converter->UFtoFloat($this->getUFFromText($tr->filter('td')->getNode(3)->textContent));

        return new AfpSupport($nombreAfp, $codigo, $dependiente, $dependienteSis, $independiente);
    }

    /**
     * get all indicators.
     *
     * @return array
     */
    public function all(): array
    {
        return [
            'uf' => $this->getUF(),
            'utm' => $this->getUTM(),
            'rentaTopeImponibleAfp' => $this->getRentaTopeImponibleAfp(),
            'rentaTopeImponibleIps' => $this->getRentaTopeImponibleIps(),
            'rentaTopeImponibleCesantia' => $this->getRentaTopeImponibleCesantia(),
            'rentaMinimaImponibleDependiente' => $this->getRentaMinimaImponibleDependiente(),
            'rentaMinimaImponibleMenores' => $this->getRentaMinimaImponibleMenores(),
            'rentaMinimaImponibleParticulares' => $this->getRentaMinimaImponibleParticulares(),
            'topeApvMensual' => $this->getTopeAPVMensual(),
            'topeApvAnual' => $this->getTopeAPVAnual(),
            'cesantia' => $this->getSeguroCesantia(),
            'afp' => [
                $this->getAfpCapital()->toArray(),
                $this->getAfpCuprum()->toArray(),
                $this->getAfpHabitat()->toArray(),
                $this->getAfpPlanVital()->toArray(),
                $this->getAfpProvida()->toArray(),
                $this->getAfpModelo()->toArray(),
                $this->getAfpUno()->toArray(),
            ],
            'asignacionTramoAMonto' => $this->getAsignacionTramoAMonto(),
            'asignacionTramoBMonto' => $this->getAsignacionTramoBMonto(),
            'asignacionTramoCMonto' => $this->getAsignacionTramoCMonto(),
            'asignacionTramoA' => $this->getAsignacionTramoA(),
            'asignacionTramoB' => $this->getAsignacionTramoB(),
            'asignacionTramoC' => $this->getAsignacionTramoC(),
            'asignacionTramoD' => $this->getAsignacionTramoD(),
        ];
    }
}
