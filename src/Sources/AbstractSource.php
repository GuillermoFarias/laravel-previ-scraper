<?php

namespace Gfarias\PreviScraper\Sources;

use Goutte\Client;

abstract class AbstractSource
{
    /**
     * client.
     *
     * @var \Goutte\Client
     */
    public $client = null;

    /**
     * dom.
     *
     * @var \Symfony\Component\DomCrawler\Crawler
     */
    public $dom;

    /**
     * url.
     *
     * @var string
     */
    protected $url;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * setIndicators
     *
     * @return self
     */
    abstract public function setIndicators(): self;

    /**
     * all
     *
     * @return array
     */
    abstract public function all(): array;

    /**
     * extraer clp con puntuación desde texto.
     *
     * @return string
     */
    public function getCLPFromText(string $text): string
    {
        preg_match('/([0-9.0-9]{2,30}(,[0-9]{1,3})?)/', $text, $result);

        if (is_array($result) && isset($result[0])) {
            return (string) $result[0];
        }

        return '0';
    }

    /**
     * extraer montos clp con puntuación desde texto.
     *
     * @return array
     */
    public function getAllCLPFromText(string $text): array
    {
        preg_match_all('/([0-9.0-9]{2,30}(,[0-9]{1,3})?)/', $text, $result);

        return $result[0];
    }

    /**
     * extraer Uf con puntuación desde texto.
     *
     * @return string
     */
    public function getUFFromText(string $text): string
    {
        preg_match('/([0-9,0-9]{2,30})/', $text, $result);

        if (is_array($result) && isset($result[0])) {
            return (string) $result[0];
        }

        return '0';
    }

    /**
     * Convertir UF a Pesos Chilenos
     * "34,6" => 34.6.
     *
     * @param string $monto
     * @return float
     */
    public function UFtoFloat(string $monto): float
    {
        $monto = str_replace(',', '.', $monto);

        return floatval($monto);
    }

    /**
     * Convertir CLP a número
     * "234.568,34" => 234568.34.
     *
     * @param string $monto
     * @return float
     */
    public function CLPtoFloat(string $monto): float
    {
        $monto = str_replace('.', '', $monto);
        $monto = str_replace(',', '.', $monto);

        return floatval($monto);
    }

    /**
     * Set dom.
     *
     * @param  \Symfony\Component\DomCrawler\Crawler  $dom  dom.
     * @return  self
     */
    public function setDom(\Symfony\Component\DomCrawler\Crawler $dom): self
    {
        $this->dom = $dom;
        return $this;
    }
}
