<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Product;
use App\Service\RickAndMortyApiService;



class AppFixtures extends Fixture
{
    private RickAndMortyApiService $rickAndMortyService;
    private $prices = ["8"];
    private $quantites = [20];

    public function __construct(RickAndMortyApiService $rickAndMortyService)
    {
        $this->rickAndMortyService = $rickAndMortyService;
    }

    public function load(ObjectManager $manager): void
    {
        $data = $this->rickAndMortyService->loadApi();
        foreach ($data as $model){
            $product = new Product();
            $product->setName($model->getName());
            $product->setPrice($this->prices[array_rand($this->prices, 1)]);
            $product->setQuantity($this->quantites[array_rand($this->quantites, 1)]);
            $product->setImage($model->getImage());
            $manager->persist($product);
        }
      
        $manager->flush();
    }
}
