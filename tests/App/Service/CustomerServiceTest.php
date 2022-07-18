<?php
declare(strict_types=1);

namespace App\Service;


use PHPUnit\Framework\TestCase;

class CustomerServiceTest extends TestCase
{
    public function testCanCreateCustomerService(): void
    {
        $customerService = new CustomerService();
        $this->assertIsObject($customerService);
    }

    public function testGetCustomerId(): int
    {
        $customerService = new CustomerService();
        $customerData = $customerService->getCustomer(1);
        $customerId = $customerData['id'];
        $this->assertSame(1, $customerId);
        return $customerId;
    }

    /**
     * @param int $customerId
     * @depends testGetCustomerId
     */
    public function testCheckIdCustomer(int $customerId): void
    {
        $customerService = new CustomerService();
        $this->assertTrue($customerService->checkId($customerId));
    }
}
