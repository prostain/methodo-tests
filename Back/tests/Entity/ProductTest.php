<?php

namespace App\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Entity\Product;


class ProductTest extends WebTestCase
{
    public function testProduct(): void
    {
        $product = new Product();
        $this->assertInstanceOf(Product::class, $product);
    }

    public function testProductId(): void
    {
        $product = new Product();
        $this->assertNull($product->getId());
    }

    public function testProductName(): void
    {
        $product = new Product();
        $product->setName("toto");
        $this->assertEquals("toto", $product->getName());
    }

    public function testProductPrice(): void
    {
        $product = new Product();
        $product->setPrice(20);
        $this->assertEquals(20, $product->getPrice());
    }

    public function testProductQuantity(): void
    {
        $product = new Product();
        $product->setQuantity(10);
        $this->assertEquals(10, $product->getQuantity());
    }

    public function testProductImage(): void
    {
        $product = new Product();
        $product->setImage("image/url.com");
        $this->assertEquals("image/url.com", $product->getImage());
    }

}
