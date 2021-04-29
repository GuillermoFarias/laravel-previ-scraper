<?php

namespace Gfarias\PreviScraper\Sources;

class Sii extends AbstractSource
{
    /**
     * url de Sii.
     *
     * @var string
     */
    protected $url = 'https://www.sii.cl/valores_y_fechas/impuesto_2da_categoria/';

    /**
     * define la fila de lectura para cada periodo en el dom.
     *
     * @var array
     */
    private $positions = ['mensual', 'quincenal', 'semanal', 'diario'];

    /**
     * total de filas en cada tabla para leer.
     *
     * @var int
     */
    private $totalRows = 0;

    /**
     * tabla dom.
     *
     * @var \Symfony\Component\DomCrawler\Crawler
     */
    private $table = null;

    /**
     * establecer periodo mediante mes y año.
     *
     * @param  string $month
     * @param  int $year
     * @return \Gfarias\PreviScraper\Sources\Sii
     */
    public function setPeriod(string $month, int $year): Sii
    {
        $url = "{$this->url}impuesto$year.htm";
        $this->dom = $this->client->request('GET', $url);
        $this->table = $this->dom->filter("#mes_$month table")->first();

        if (! $this->table->first()->getNode(0)) {
            throw new \Exception('No data for this period');
        }

        $this->setIndicators();

        return $this;
    }

    /**
     * setIndicators.
     *
     * @return self
     */
    public function setIndicators()
    {
        $this->setRowPositionsPeriods();

        return $this;
    }

    /**
     * setear la fila de lectura en html para cada periodo
     * el dom html contiene todas las tablas del año-mes-periodo (quincenal, semana...).
     *
     * @return void
     */
    private function setRowPositionsPeriods(): void
    {
        foreach ($this->positions as $index => $position) {
            foreach ($this->table->filter('tr') as $i => $tr) {
                if (str_contains(strtolower($tr->textContent), $position)) {
                    $this->positions[$position] = $i;
                    unset($this->positions[$index]);
                }
                $this->totalRows = $i;
            }
        }
    }

    /**
     * obtener todos los indicadores.
     *
     * @return array
     */
    public function all(): array
    {
        return [
            'mensual' => $this->getTramosMensuales(),
            'quincenal' => $this->getTramosQuincenales(),
            'semanal' => $this->getTramosSemanales(),
            'diario' => $this->getTramosDiarios(),
        ];
    }

    /**
     * getTramosMensuales.
     *
     * @return array
     */
    public function getTramosMensuales(): array
    {
        $inicio = $this->positions['mensual'];
        $fin = $this->positions['quincenal'];

        return $this->getIndicatorsFromTable('mensual', $inicio, $fin);
    }

    /**
     * getTramosQuincenales.
     *
     * @return array
     */
    public function getTramosQuincenales(): array
    {
        $inicio = $this->positions['quincenal'];
        $fin = $this->positions['semanal'];

        return $this->getIndicatorsFromTable('quincenal', $inicio, $fin);
    }

    /**
     * getTramosSemanales.
     *
     * @return array
     */
    public function getTramosSemanales(): array
    {
        $inicio = $this->positions['semanal'];
        $fin = $this->positions['diario'];

        return $this->getIndicatorsFromTable('semanal', $inicio, $fin);
    }

    /**
     * getTramosDiarios.
     *
     * @return array
     */
    public function getTramosDiarios(): array
    {
        $inicio = $this->positions['diario'];
        $fin = $this->totalRows;

        return $this->getIndicatorsFromTable('diario', $inicio, $fin);
    }

    /**
     * getIndicatorsFromTable.
     *
     * @param  int $inicio
     * @param  int $fin
     * @return array
     */
    private function getIndicatorsFromTable(string $periodo, int $inicio, int $fin): array
    {
        $indicadores = [];
        for ($i = $inicio; $i < $fin; $i++) {
            $tr = $this->table->filter('tr')->getNode($i);
            $tds = explode("\n", $tr->textContent);

            $data = [
                'periodo' => $periodo,
                'desde' => $this->CLPtoFloat($this->getCLPFromText($tds[0])),
                'hasta' => $this->CLPtoFloat($this->getCLPFromText($tds[1])),
                'factor' => $this->UFtoFloat($this->getUFFromText($tds[2])),
                'descuento' => $this->CLPtoFloat($this->getCLPFromText($tds[3])),
                'impuesto' => $this->UFtoFloat($this->getUFFromText($tds[4])),
            ];
            array_push($indicadores, $data);
        }

        return $indicadores;
    }
}
