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
}
