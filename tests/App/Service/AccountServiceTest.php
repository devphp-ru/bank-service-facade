<?php
declare(strict_types=1);

namespace App\Service;


use PHPUnit\Framework\TestCase;

class AccountServiceTest extends TestCase
{
    /** @var AccountService $accountService */
    public AccountService $accountService;

    public function setUp(): void
    {
        $this->accountService = new AccountService();
    }

    public function testCanCreateAccountService(): void
    {
        $this->assertIsObject($this->accountService);
        $this->assertInstanceOf(AccountService::class, $this->accountService);
    }

    public function testGetLoan(): void
    {
        $this->assertTrue($this->accountService->getLoan(1000));
    }

    public function testSerCustomerBalance(): void
    {
        $this->assertTrue($this->accountService->setCustomerBalance(1, 1000));
    }
}
