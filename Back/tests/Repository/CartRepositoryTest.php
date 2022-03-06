<?php
namespace App\Tests\Repository;

use App\Entity\Cart;
use App\Repository\CartRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CartRepositoryTest extends KernelTestCase
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

    public function testCartConstruct()
    {
        $cartRepository = $this->managerRegistry
            ->getRepository(Cart::class);

        $this->assertInstanceOf(CartRepository::class, $cartRepository);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->managerRegistry->close();
        $this->managerRegistry = null;
    }
}