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
$previred = $previScraper();
print_r($previred->all());

```


## Indicadores disponibles

### Sii
| método                   | retorno |
|--------------------------|:-------:|
| `getTramosMensuales()`   |  array  |
| `getTramosQuincenales()` |  array  |
| `getTramosSemanales()`   |  array  |
| `getTramosDiarios()`     |  array  |
| `all()`                  |  array  |

Cada contiene un arreglo de
### Ejemplos de Sii

Obtener indicadores mensuales del periodo Enero 2018

```php
$previScraper = new PreviScraper();
$indicadoresMensuales = $previScraper->sii(1, 2018)->getIndicadoresMensuales();
print_r($indicadoresMensuales);
```

El output de estos indicadores sería

```bash
 Array
(
    [mensual] => Array
        (
            [0] => Array
                (
                    [periodo] => mensual
                    [desde] => 0
                    [hasta] => 0
                    [factor] => 696
                    [descuento] => 0
                    [impuesto] => 0
                )

            [1] => Array
                (
                    [periodo] => mensual
                    [desde] => 0
                    [hasta] => 696492.01
                    [factor] => 547
                    [descuento] => 4
                    [impuesto] => 27
                )

            [2] => Array
                (
                    [periodo] => mensual
                    [desde] => 0
                    [hasta] => 1547760.01
                    [factor] => 579
                    [descuento] => 8
                    [impuesto] => 89
                )

            [3] => Array
                (
                    [periodo] => mensual
                    [desde] => 0
                    [hasta] => 2579600.01
                    [factor] => 611
                    [descuento] => 135
                    [impuesto] => 231
                )

            [4] => Array
                (
                    [periodo] => mensual
                    [desde] => 0
                    [hasta] => 3611440.01
                    [factor] => 643
                    [descuento] => 23
                    [impuesto] => 574
                )

            [5] => Array
                (
                    [periodo] => mensual
                    [desde] => 0
                    [hasta] => 4643280.01
                    [factor] => 191
                    [descuento] => 304
                    [impuesto] => 918
                )

            [6] => Array
                (
                    [periodo] => mensual
                    [desde] => 0
                    [hasta] => 6191040.01
                    [factor] => 15
                    [descuento] => 35
                    [impuesto] => 203
                )

            [7] => Array
                (
                    [periodo] => mensual
                    [desde] => 0
                    [hasta] => 15993520.01
                    [factor] => 0
                    [descuento] => 0
                    [impuesto] => 2
                )

        )
)
```


### Previred
| método                   | retorno |
|--------------------------|:-------:|
| `getTramosMensuales()`   |  array  |
| `getTramosQuincenales()` |  array  |
| `getTramosSemanales()`   |  array  |
| `getTramosDiarios()`     |  array  |
| `all()`                  |  array  |


