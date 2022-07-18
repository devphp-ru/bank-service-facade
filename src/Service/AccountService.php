<?php
declare(strict_types=1);

namespace App\Service;


class AccountService
{
    public function getLoan(float $amount): bool
    {
        return true;
    }

    public function setCustomerBalance(int $id, float $amount): bool
    {
        return true;
    }
}
