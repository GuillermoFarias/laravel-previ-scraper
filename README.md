# Laravel PreviService 
## Indicadores previsionales Chile 🇨🇱

[![tests](https://github.com/GuillermoFarias/laravel-previ-service/actions/workflows/tests.yml/badge.svg?branch=master)](https://github.com/GuillermoFarias/laravel-previ-service/actions/workflows/tests.yml)
[![codecov](https://codecov.io/gh/GuillermoFarias/laravel-previ-service/branch/master/graph/badge.svg?token=HVGSSZKQOC)](https://codecov.io/gh/GuillermoFarias/laravel-previ-service)
[![CodeFactor](https://www.codefactor.io/repository/github/guillermofarias/laravel-previ-service/badge)](https://www.codefactor.io/repository/github/guillermofarias/laravel-previ-service)
[![StyleCI](https://github.styleci.io/repos/361124148/shield?branch=master)](https://github.styleci.io/repos/361124148?branch=master)

[![Latest Stable Version](https://poser.pugx.org/gfarias/laravel-previ-service/v)](//packagist.org/packages/gfarias/laravel-previ-service) 
[![Total Downloads](https://poser.pugx.org/gfarias/laravel-previ-service/downloads)](//packagist.org/packages/gfarias/laravel-previ-service) 
[![Latest Unstable Version](https://poser.pugx.org/gfarias/laravel-previ-service/v/unstable)](//packagist.org/packages/gfarias/laravel-previ-service) 
[![License](https://poser.pugx.org/gfarias/laravel-previ-service/license)](//packagist.org/packages/gfarias/laravel-previ-service)

Indicadores previsionales desde Previred y tramos de impuesto desde SII

Los datos se obtienen utilizando *[web scraping](https://es.wikipedia.org/wiki/Web_scraping#:~:text=Web%20scraping%20o%20raspado%20web,un%20navegador%20en%20una%20aplicaci%C3%B3n.)* ([Previred](https://www.previred.com/web/previred/indicadores-previsionales) - [Sii](https://www.sii.cl/valores_y_fechas/impuesto_2da_categoria/impuesto2021.htm))

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

Puedes utilizar el provider e inyectarlo directo en los métodos ejecutados por el framework

```php

public function handle(PreviServiceProvider $previServiceProvider): void {
    $sii = $previServiceProvider->sii();
    print_r($sii->all());
}
```

esto te entrega el output :

```bash
 
```


## Indicadores disponibles

### Previred

### Sii



