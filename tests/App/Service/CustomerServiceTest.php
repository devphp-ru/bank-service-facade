<?php
declare(strict_types=1);

namespace App\Service;


use PHPUnit\Framework\TestCase;

class CustomerServiceTest extends TestCase
{
    /** @var CustomerService $customerService */
    public CustomerService $customerService;

    public function setUp(): void
    {
        $this->customerService = new CustomerService();
    }

    public function testCanCreateCustomerService(): void
    {
        $this->assertIsObject($this->customerService);
    }

    public function testGetCustomerId(): int
    {
        $customerData = $this->customerService->getCustomer(1);
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
