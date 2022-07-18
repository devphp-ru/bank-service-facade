<?php
declare(strict_types=1);

namespace App\Service;


use PHPUnit\Framework\TestCase;

class LoanServiceTest extends TestCase
{
    public function testCanCreateLoanService(): void
    {
        $loanService = new LoanService();
        $this->assertIsObject($loanService);
    }
}
