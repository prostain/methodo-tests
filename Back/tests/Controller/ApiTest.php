<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiTest extends WebTestCase
{
    public function testApiController(): void
    {
        $client = static::createClient();
        // Request a specific page
        $client->jsonRequest('GET', '/api/');
        $response = $client->getResponse();
        //$this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals(['message' => "Hello world"], $responseData);
    }
    
    public function testApiProducts(): void
    {
        $client = static::createClient();
        // Request a specific page
        $client->jsonRequest('GET', '/api/products');
        $response = $client->getResponse();
        //$this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);

        $this->assertCount(20, $responseData);
    }
    
    public function testApiProduct(): void
    {
        $client = static::createClient();
        // Request a specific page
        $client->jsonRequest('GET', '/api/products/1');
        $response = $client->getResponse();
        //$this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);

        $this->assertEquals([
            "id" => 1,
            "name" => "Rick Sanchez",
            "price" => "8",
            "quantity" => 20,
            "image" => "https://rickandmortyapi.com/api/character/avatar/1.jpeg"
          ], $responseData);
    }
    
    public function testApiAddToCart(): void
    {
        $client = static::createClient();
        // Request a specific page

        $client->jsonRequest('POST', '/api/cart/10', [
            'quantity' => 1
        ]);
        $response = $client->getResponse();
        //$this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);

        $this->assertEquals([
            "id" => 10,
            "name" => "Alan Rails",
            "price" => "8",
            "quantity" => 20,
            "image" => "https://rickandmortyapi.com/api/character/avatar/10.jpeg"
        ], $responseData['products'][0]);
    }
    
    public function testApiAddToMuchInCart(): void
    {
        $client = static::createClient();
        // Request a specific page

        $client->jsonRequest('POST', '/api/cart/10', [
            'quantity' => 10000
        ]);
        $response = $client->getResponse();
        //$this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);

        $this->assertEquals(["error" => "too many"], $responseData);
    }

    public function testApiGetCart(): void
    {
        $client = static::createClient();
        // Request a specific page

        $client->jsonRequest('GET', '/api/cart');
        $response = $client->getResponse();
        //$this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);

        $this->assertEquals([
            "id" => 10,
            "name" => "Alan Rails",
            "price" => "8",
            "quantity" => 20,
            "image" => "https://rickandmortyapi.com/api/character/avatar/10.jpeg"
        ], $responseData['products'][0]);
    }

    public function testApiRemoveFromCart(): void
    {
        $client = static::createClient();
        $client->jsonRequest('DELETE', '/api/cart/10');
        $response = $client->getResponse();
        //$this->assertResponseIsSuccessful();
        $this->assertJson($response->getContent());
        $responseData = json_decode($response->getContent(), true);

        $this->assertEquals([], $responseData['products']);
    }
}
