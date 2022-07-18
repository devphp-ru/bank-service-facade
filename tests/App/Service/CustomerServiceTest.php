<?php
declare(strict_types=1);

namespace App\Service;


use PHPUnit\Framework\TestCase;

class CustomerServiceTest extends TestCase
{
    public function testCanCreateCustomerService(): void
    {
        $customerService = new CustomerService(1);
        $this->assertIsObject($customerService);
    }

    public function testGetCustomerId(): void
    {
        $customerService = new CustomerService(1);
        $customerData = $customerService->getCustomer();
        $this->assertSame(1, $customerData['id']);
    }
}
