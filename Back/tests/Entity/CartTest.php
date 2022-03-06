<?php

namespace App\Tests\Entity;

use App\Entity\Cart;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class CartTest extends WebTestCase
{
    public function testCartId(): void
    {
        $cart = new Cart();
        $this->assertNull($cart->getId());
    }
 
    public function testCartProduct(){
        $cart = new Cart();
        $product = new Product();
        
        $cart->addProduct($product);
        $this->assertContainsOnlyInstancesOf(Product::class, $cart->getProducts());
    }

    public function testCartRemoveProduct(){
        $cart = new Cart();
        $product = new Product();
        $cart->addProduct($product);
        $this->assertCount(1, $cart->getProducts());

        $cart->removeProduct($product);
        $this->assertCount(0, $cart->getProducts());
    }
}
