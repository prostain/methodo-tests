<?php
namespace App\Tests\Repository;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\Persistence\ManagerRegistry;
     */
    private $managerRegistry;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->managerRegistry = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testProductConstruct()
    {
        $productRepository = $this->managerRegistry
        ->getRepository(Product::class); 

        $this->assertInstanceOf(ProductRepository::class, $productRepository);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->managerRegistry->close();
        $this->managerRegistry = null;
    }
}