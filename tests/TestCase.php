<?php

namespace Gfarias\PreviScraper\Tests;

use Gfarias\PreviScraper\PreviScraperServiceProvider;
use GrahamCampbell\TestBench\AbstractPackageTestCase;

class TestCase extends AbstractPackageTestCase
{
    protected function getServiceProviderClass()
    {
        return PreviScraperServiceProvider::class;
    }
}
