<?php
declare(strict_types=1);

namespace App\Service;


use PHPUnit\Framework\TestCase;

class LoanServiceTest extends TestCase
{
    /** @var LoanService $loanService */
    public LoanService $loanService;

    public function setUp(): void
    {
        $this->loanService = new LoanService();
    }

    public function testCanCreateLoanService(): void
    {
        $this->assertIsObject($this->loanService);
    }

    public function testCheckCreditRating(): void
    {
        $this->assertTrue($this->loanService->checkCreditRating(1, 1000));
    }
}
