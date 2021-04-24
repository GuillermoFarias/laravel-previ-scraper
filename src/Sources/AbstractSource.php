<?php

namespace Gfarias\PreviService\Sources;

use Gfarias\PreviService\Supports\Converter;
use Goutte\Client;

class AbstractSource
{
    /** @var \Gfarias\PreviService\Supports\Converter */
    public $converter = null;

    /** @var \Goutte\Client */
    public $client = null;

    /** @var \Symfony\Component\DomCrawler\Crawler */
    public $dom = null;

    /** @var string */
    protected $url = '';

    public function __construct()
    {
        $this->client = new Client();
        $this->converter = new Converter();
    }

    /**
     * extraer clp con puntuación desde texto
     */
    public function getCLPFromText(string $text): string
    {
        preg_match('/([0-9.0-9]{2,30}(,[0-9]{1,3})?)/', $text, $result);

        if (is_array($result) && isset($result[0])) {
            return (string) $result[0];
        }

        return "0";
    }

    /**
     * extraer montos clp con puntuación desde texto
     */
    public function getAllCLPFromText(string $text): array
    {
        preg_match_all('/([0-9.0-9]{2,30}(,[0-9]{1,3})?)/', $text, $result);
        return $result[0];
    }

    /**
     * extraer Uf con puntuación desde texto
     */
    public function getUFFromText(string $text): string
    {
        preg_match('/([0-9,0-9]{2,30})/', $text, $result);

        if (is_array($result) && isset($result[0])) {
            return (string) $result[0];
        }

        return "0";
    }
}
