<?php

namespace tests;

use Oxford\External\Factory\CacheServiceFactory;
use Oxford\External\Factory\ClientServiceFactory;
use Oxford\External\Factory\LogginServiceFactory;
use PHPUnit\Framework\TestCase;
use Oxford\API\OxfordDictionaryAPI;
use App\App;

class OxfordDictionaryAPITest extends TestCase
{
    public function setUp(): void
    {
        $word = 'example';

        $clientService = CacheServiceFactory::create();
        $cacheService = $this->getMockBuilder(CacheServiceFactory::class)->setMethods(['get','set'])->getMock();
        $LoggingService = $this->getMockBuilder(LogginServiceFactory::class)->setMethods(['get','set','error'])->getMock();
        $this->oxfordAPI = new OxfordDictionaryAPI($clientService, $cacheService, $LoggingService, $word);
    }

    public function tearDown(): void
    {
        unset($this->oxfordAPI);
    }

    public function testIndex()
    {
        $output = $this->oxfordAPI->index();

        $this->assertIsString($output);
    }

}