<?php

namespace App\Tests\Model;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Model\RickAndMortyModel;


class RickAndMortyModelTest extends WebTestCase
{
    public function testRickAndMortyModel(): void
    {
        $rickAndMorty = new RickAndMortyModel();
        $this->assertInstanceOf(RickAndMortyModel::class, $rickAndMorty);
    }

    public function testRickAndMortyName(): void
    {
        $rickAndMorty = new RickAndMortyModel();
        $rickAndMorty->setName("Rick");

        $this->assertEquals("Rick", $rickAndMorty->getName());
    }

    public function testRickAndMortyImage(): void
    {
        $rickAndMorty = new RickAndMortyModel();
        $rickAndMorty->setImage("image/url.com");

        $this->assertEquals("image/url.com", $rickAndMorty->getImage());
    }

}
