<?php

namespace Gfarias\PreviService\Supports;

class AfpSupport
{
    public const CODE_DEFAULT = '00';
    public const CODE_CUPRUM = '03';
    public const CODE_HABITAT = '05';
    public const CODE_PROVIDA = '08';
    public const CODE_PLANVITAL = '29';
    public const CODE_CAPITAL = '33';
    public const CODE_MODELO = '34';
    public const CODE_UNO = '35';

    /**
     * nombre.
     *
     * @var string
     */
    private $nombre;

    /**
     * codigo.
     *
     * @var string
     */
    private $codigo;

    /**
     * porcentajeDependiente.
     *
     * @var float
     */
    private $porcentajeDependiente;

    /**
     * porcentajeDependienteSis.
     *
     * @var float
     */
    private $porcentajeDependienteSis;

    /**
     * porcentajeIndependiente.
     *
     * @var float
     */
    private $porcentajeIndependiente;

    /**
     * __construct.
     *
     * @param string $nombre
     * @param string $codigo
     * @param float  $porcentajeDependiente
     * @param float  $porcentajeDependienteSis
     * @param float  $porcentajeIndependiente
     * @return void
     */
    public function __construct(
        string $nombre,
        string $codigo,
        float $porcentajeDependiente,
        float $porcentajeDependienteSis,
        float $porcentajeIndependiente
    ) {
        $this->nombre = $nombre;
        $this->codigo = $codigo;
        $this->porcentajeDependiente = $porcentajeDependiente;
        $this->porcentajeDependienteSis = $porcentajeDependienteSis;
        $this->porcentajeIndependiente = $porcentajeIndependiente;
    }

    /**
     * nombre Afp.
     *
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * codigo afp.
     *
     * @return string
     */
    public function getCodigo(): string
    {
        return $this->codigo;
    }

    /**
     * obtener porcentaje dependiente desde indicador AFP.
     *
     * @return float
     */
    public function getPorcentajeDependiente(): float
    {
        return $this->porcentajeDependiente;
    }

    /**
     * obtener porcentaje SIS desde indicador AFP.
     *
     * @return float
     */
    public function getPorcentajeSis(): float
    {
        return $this->porcentajeDependienteSis;
    }

    /**
     * obtener porcentaje independiente desde indicador AFP.
     *
     * @return float
     */
    public function getPorcentajeIndependiente(): float
    {
        return $this->porcentajeIndependiente;
    }

    /**
     * toArray.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'nombre' => $this->nombre,
            'codigo' => $this->codigo,
            'dependiente' => $this->porcentajeDependiente,
            'dependienteSis' => $this->porcentajeDependienteSis,
            'independiente' => $this->porcentajeIndependiente,
        ];
    }
}
