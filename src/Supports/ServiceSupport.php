<?php

namespace App\Layers\Services\Remuneraciones\Supports;

abstract class ServiceSupport
{
    public const MES_ENERO = 'enero';
    public const MES_FEBRERO = 'febrero';
    public const MES_MARZO = 'marzo';
    public const MES_ABRIL = 'abril';
    public const MES_MAYO = 'mayo';
    public const MES_JUNIO = 'junio';
    public const MES_JULIO = 'julio';
    public const MES_AGOSTO = 'agosto';
    public const MES_SEPTIEMBRE = 'septiembre';
    public const MES_OCTUBRE = 'octubre';
    public const MES_NOVIEMBRE = 'noviembre';
    public const MES_DICIEMBRE = 'diciembre';

    public const MESES = [
        1 => self::MES_ENERO,
        2 => self::MES_FEBRERO,
        3 => self::MES_MARZO,
        4 => self::MES_ABRIL,
        5 => self::MES_MAYO,
        6 => self::MES_JUNIO,
        7 => self::MES_JULIO,
        8 => self::MES_AGOSTO,
        9 => self::MES_SEPTIEMBRE,
        10 => self::MES_OCTUBRE,
        11 => self::MES_NOVIEMBRE,
        12 => self::MES_DICIEMBRE
    ];
}
