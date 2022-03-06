<?php

namespace App\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Service\RickAndMortyApiService;

class RickAndMortyApiServiceTest extends KernelTestCase
{
    public function testRickAndMortyApiService(): void
    {
        $kernel = self::bootKernel();
        
        $container = static::getContainer();
        $RickAndMortyApi = $container->get(RickAndMortyApiService::class);
        $this->assertTrue($RickAndMortyApi->loadApi() > 1);
    }
}