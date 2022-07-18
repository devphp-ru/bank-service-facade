<?php
declare(strict_types=1);

namespace App\Service;


use App\Models\Customer;

class CustomerService
{
    /** @var Customer $customer */
    private Customer $customer;

    public function __construct()
    {
        $this->customer = Customer::create();
    }

    public function getCustomer(int $sessionId): array
    {
        $result = $this->customer->one($sessionId);
        return $result;
    }

    public function checkId(int $customerId): bool
    {
        $result = $this->customer->only('id', $customerId, 'id');
        return (bool)$result;
    }
}
