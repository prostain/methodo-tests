<?php

use App\DataFixtures\AppFixtures;
use App\Service\RickAndMortyGestion;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Doctrine\ORM\EntityManagerInterface;

class FixturesTest extends KernelTestCase
{
    protected function setUp(): void {
        parent::setUp();
        exec("php bin/console doctrine:database:drop --env=test --force");
        exec("php bin/console doctrine:database:create --env=test");
        exec("php bin/console doctrine:migration:migrate -n --env=test");
    }
    public function testFixutres()
    {
        $appFixtures = self::getContainer()->get(AppFixtures::class);
        $objectManager = self::getContainer()->get(EntityManagerInterface::class);
        $gestion = self::getContainer()->get(RickAndMortyGestion::class);
        
        $appFixtures->load($objectManager);
        $result = $gestion->findAll();
        // tester si les fixtures sont bien load
        // faire le mock pour éviter l'appel à chaques fois

        $this->assertCount(20, $result);
    }
}

?>