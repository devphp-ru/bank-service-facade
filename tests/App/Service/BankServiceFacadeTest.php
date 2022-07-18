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
        $this->bankServiceFacade = new BankServiceFacade();
    }

    public function testCanBankServiceFacade(): void
    {
        $this->assertIsObject($this->bankServiceFacade);
    }
}
