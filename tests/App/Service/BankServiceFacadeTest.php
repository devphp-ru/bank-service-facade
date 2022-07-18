<?php
declare(strict_types=1);

namespace App\Service;


use PHPUnit\Framework\TestCase;

class BankServiceFacadeTest extends TestCase
{
    /** @var BankServiceFacade $bankServiceFacade */
    public BankServiceFacade $bankServiceFacade;

    public function setUp(): void
    {
        $this->bankServiceFacade = new BankServiceFacade(
            new CustomerService(),
            new LoanService(),
            new AccountService()
        );
    }

    public function testCanBankServiceFacade(): void
    {
        $this->assertIsObject($this->bankServiceFacade);
    }

    public function testBankServiceFacade(): void
    {
        $this->assertTrue($this->bankServiceFacade->getLoan(1, 1000));
    }
}
