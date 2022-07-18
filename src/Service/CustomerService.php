<?php
declare(strict_types=1);

namespace App\Service;


class CustomerService
{
    public function getCustomer(int $sessionId): array
    {
        return ['id' => $sessionId];
    }
}
