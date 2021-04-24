<?php

namespace Gfarias\PreviScraper;

class CesantiaSupport
{
    /**
     * indefinidoEmpleador
     *
     * @var float
     */
    private $indefinidoEmpleador = 0.0;

    /**
     * indefinidoTrabajador
     *
     * @var float
     */
    private $indefinidoTrabajador = 0.0;

    /**
     * plazoFijoEmpleador
     *
     * @var float
     */
    private $plazoFijoEmpleador = 0.0;

    /**
     * indefinidoSobre11Empleador
     *
     * @var float
     */
    private $indefinidoSobre11Empleador = 0.0;

    /**
     * casaParticularEmpleador
     *
     * @var float
     */
    private $casaParticularEmpleador = 0.0;

    /**
     * __construct
     * @param  float $indefinidoEmpleador
     * @param  float $indefinidoTrabajador
     * @param  float $plazoFijoEmpleador
     * @param  float $indefinidoSobre11Empleador
     * @param  float $casaParticularEmpleador
     * @return void
     */
    public function __construct(
        float $indefinidoEmpleador,
        float $indefinidoTrabajador,
        float $plazoFijoEmpleador,
        float $indefinidoSobre11Empleador,
        float $casaParticularEmpleador
    ) {
        $this->indefinidoEmpleador = $indefinidoEmpleador;
        $this->indefinidoTrabajador = $indefinidoTrabajador;
        $this->plazoFijoEmpleador = $plazoFijoEmpleador;
        $this->indefinidoSobre11Empleador = $indefinidoSobre11Empleador;
        $this->casaParticularEmpleador = $casaParticularEmpleador;
    }

    /**
     * Get indefinidoEmpleador
     *
     * @return  float
     */
    public function getIndefinidoEmpleador(): float
    {
        return $this->indefinidoEmpleador;
    }

    /**
     * Get indefinidoTrabajador
     *
     * @return  float
     */
    public function getIndefinidoTrabajador(): float
    {
        return $this->indefinidoTrabajador;
    }

    /**
     * Get plazoFijoEmpleador
     *
     * @return  float
     */
    public function getPlazoFijoEmpleador(): float
    {
        return $this->plazoFijoEmpleador;
    }

    /**
     * Get indefinidoSobre11Empleador
     *
     * @return  float
     */
    public function getIndefinidoSobre11Empleador(): float
    {
        return $this->indefinidoSobre11Empleador;
    }

    /**
     * Get casaParticularEmpleador
     *
     * @return  float
     */
    public function getCasaParticularEmpleador(): float
    {
        return $this->casaParticularEmpleador;
    }

    /**
     * toArray
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'indefinidoEmpleador' => $this->indefinidoEmpleador,
            'indefinidoTrabajador' => $this->indefinidoTrabajador,
            'plazoFijoEmpleador' => $this->plazoFijoEmpleador,
            'indefinidoSobre11Empleador' => $this->indefinidoSobre11Empleador,
            'casaParticularEmpleador' => $this->casaParticularEmpleador
        ];
    }
}
