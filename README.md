# Laravel PreviScraper 
## Indicadores previsionales Chile 🇨🇱

[![tests](https://github.com/GuillermoFarias/laravel-previ-scraper/actions/workflows/tests.yml/badge.svg?branch=master)](https://github.com/GuillermoFarias/laravel-previ-scraper/actions/workflows/tests.yml)
[![codecov](https://codecov.io/gh/GuillermoFarias/laravel-previ-scraper/branch/master/graph/badge.svg?token=HVGSSZKQOC)](https://codecov.io/gh/GuillermoFarias/laravel-previ-scraper)
[![CodeFactor](https://www.codefactor.io/repository/github/guillermofarias/laravel-previ-scraper/badge)](https://www.codefactor.io/repository/github/guillermofarias/laravel-previ-scraper)
[![StyleCI](https://github.styleci.io/repos/361124148/shield?branch=master)](https://github.styleci.io/repos/361124148?branch=master)
[![Latest Stable Version](https://poser.pugx.org/gfarias/laravel-previ-scraper/v)](//packagist.org/packages/gfarias/laravel-previ-scraper) 
[![Total Downloads](https://poser.pugx.org/gfarias/laravel-previ-scraper/downloads)](//packagist.org/packages/gfarias/laravel-previ-scraper) 
[![License](https://poser.pugx.org/gfarias/laravel-previ-scraper/license)](//packagist.org/packages/gfarias/laravel-previ-scraper)

Indicadores previsionales desde Previred y tramos de impuesto desde SII

> Los datos se obtienen utilizando *[web scraping](https://es.wikipedia.org/wiki/Web_scraping#:~:text=Web%20scraping%20o%20raspado%20web,un%20navegador%20en%20una%20aplicaci%C3%B3n.)* ([Previred](https://www.previred.com/web/previred/indicadores-previsionales) - [Sii](https://www.sii.cl/valores_y_fechas/impuesto_2da_categoria/impuesto2021.htm))

## Instalación

Corre el siguiente comando en la terminal:

```bash
composer require gfarias/larsvel-previ-service
```

o agrega el paquete en la sección *require* en tu archivo composer.json:

```bash
"gfarias/laravel-previ-service": "~1.0"
```

no te olvides de actualizar ```composer update```

## Cómo se usa

Puedes utilizar el provider e inyectarlo directo en los métodos ejecutados por el framework:

```php

public function handle(PreviScraper $previScraper): void {
    $sii = $previScraper->sii();
    print_r($sii->all());
}
```

o instanciar directamente PreviScraper :

```php
$previScraper = new Gfarias\PreviScraper\PreviScraper();
$previred = $previScraper->previred();
$sii = $previScraper->sii();

print_r($previred->all());
print_r($sii->all());

```

## Sii

> Soporta desde el año 2013+

| método                   | retorno |
|--------------------------|:-------:|
| `getTramosMensuales()`   |  array  |
| `getTramosQuincenales()` |  array  |
| `getTramosSemanales()`   |  array  |
| `getTramosDiarios()`     |  array  |
| `all()`                  |  array  |

Cada método entrega un arreglo con el conjunto de tramos disponibles en SII, a su vez, cada tramo contiene los siguientes datos:

| nombre    | tipo de dato | descripción 
|-----------|:------------:|-------------
| periodo   |  string      | [`mensual`,`quincenal`, `semanal`, `diario`]
| desde     |  float       | renta mínima del tramo
| hasta     |  float       | renta tope del tramo
| factor    |  float       | factor de cálculo
| descuento |  float       | Cantidad a rebajar	
| impuesto  |  float       | Tasa de Impuesto Efectiva, máxima por cada tramo de Renta

En resumen, es una fiel representación de la web de SII

![image](https://user-images.githubusercontent.com/11460907/115970244-25129780-a50f-11eb-82c0-05a878f2f421.png)


### Ejemplos de uso

Obtener indicadores mensuales del periodo Enero 2021

```php
$previScraper = new PreviScraper();
$indicadoresMensuales = $previScraper->sii(5, 2021)->getIndicadoresMensuales();
print_r($indicadoresMensuales);
```

El output de estos indicadores sería:

```bash
Array
(
    [0] => Array
        (
            [periodo] => mensual
            [desde] => 0
            [hasta] => 680022
            [factor] => 0
            [descuento] => 0
            [impuesto] => 0
        )

    [1] => Array
        (
            [periodo] => mensual
            [desde] => 680022.01
            [hasta] => 1511160
            [factor] => 0.04
            [descuento] => 27200.88
            [impuesto] => 2.2
        )

    [2] => Array
        (
            [periodo] => mensual
            [desde] => 1511160.01
            [hasta] => 2518600
            [factor] => 0.08
            [descuento] => 87647.28
            [impuesto] => 4.52
        )

    [3] => Array
        (
            [periodo] => mensual
            [desde] => 2518600.01
            [hasta] => 3526040
            [factor] => 0.135
            [descuento] => 226170.28
            [impuesto] => 7.09
        )

    [4] => Array
        (
            [periodo] => mensual
            [desde] => 3526040.01
            [hasta] => 4533480
            [factor] => 0.23
            [descuento] => 561144.08
            [impuesto] => 10.62
        )

    [5] => Array
        (
            [periodo] => mensual
            [desde] => 4533480.01
            [hasta] => 6044640
            [factor] => 0.304
            [descuento] => 896621.6
            [impuesto] => 15.57
        )

    [6] => Array
        (
            [periodo] => mensual
            [desde] => 6044640.01
            [hasta] => 15615320
            [factor] => 0.35
            [descuento] => 1174675.04
            [impuesto] => 27.48
        )

    [7] => Array
        (
            [periodo] => mensual
            [desde] => 15615320.01
            [hasta] => 0
            [factor] => 0.4
            [descuento] => 1955441.04
            [impuesto] => 27.48
        )

)
```


## Previred

> Por ahora solo soporta el periodo actual en el sitio de previred, una buena implementación sería un lector PDF para obtener datos de períodos anteriores

| método                                  | retorno |
|-----------------------------------------|:-------:|
| `getUF()`                               |  float  |
| `getUTM()`                              |  float  |
| `getRentaTopeImponibleAfp()`            |  float  |
| `getRentaTopeImponibleIps()`            |  float  |
| `getRentaTopeImponibleCesantia()`       |  float  |
| `getRentaMinimaImponibleDependiente()`  |  float  |
| `getRentaMinimaImponibleMenores()`      |  float  |
| `getRentaMinimaImponibleParticulares()` |  float  |
| `getSeguroCesantia()`                   |  `\Gfarias\PreviScraper\CesantiaSupport`  |
| `getTopeApvMensual()`                   |  float  |
| `getTopeAPVAnual()`                     |  float  |
| `getAfpCapital()`                       |  `\Gfarias\PreviScraper\AfpSupport`  |
| `getAfpCuprum()`                        |  `\Gfarias\PreviScraper\AfpSupport`  |
| `getAfpHabitat()`                       |  `\Gfarias\PreviScraper\AfpSupport`  |
| `getAfpPlanVital()`                     |  `\Gfarias\PreviScraper\AfpSupport`  |
| `getAfpProVida()`                       |  `\Gfarias\PreviScraper\AfpSupport`  |
| `getAfpModelo()`                        |  `\Gfarias\PreviScraper\AfpSupport`  |
| `getAfpUno()`                           |  `\Gfarias\PreviScraper\AfpSupport`  |
| `getAsignacionTramoAMonto()`            |  float  |
| `getAsignacionTramoBMonto()`            |  float  |
| `getAsignacionTramoCMonto()`            |  float  |
| `getAsignacionTramoA()`                 |  float  |
| `getAsignacionTramoB()`                 |  float  |
| `getAsignacionTramoC()`                 |  float  |
| `getAsignacionTramoD()`                 |  float  |
| `all()`                                 |  array  |


### `CesantiaSupport` Datos especificos del seguro de cesantía

| método                            | retorno |
|-----------------------------------|:-------:|
| `getIndefinidoEmpleador()`        |  float  |
| `getIndefinidoTrabajador()`       |  float  |
| `getPlazoFijoEmpleador()`         |  float  |
| `getIndefinidoSobre11Empleador()` |  float  |
| `getCasaParticularEmpleador()`    |  float  |
| `toArray()`                       |  array  |

### `AfpSupport` Datos especificos de cada AFP

| método                            | retorno |
|-----------------------------------|:-------:|
| `getNombre()`                     |  string |
| `getCodigo()`                     |  string |
| `getPorcentajeDependiente()`      |  float  |
| `getPorcentajeSis()`              |  float  |
| `getPorcentajeIndependiente()`    |  float  |
| `toArray()`                       |  array  |

### Emeplo de uso

```php
$previScraper = new PreviScraper();
$rentaTopeImponible = $previScraper->previred()->getRentaTopeImponibleCesantia();
$porcentajeSisAfpHabitat = $previScraper->getAfpHabitat()->getPorcentajeSis();
$aporteCesantiaEmpleadorPlazoFijo = $previScraper->getSeguroCesantia()->getPlazoFijoEmpleador();
```
