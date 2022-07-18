<?php
declare(strict_types=1);

namespace App\Service;


class BankServiceFacade
{
    /** @var CustomerService $customerService */
    private CustomerService $customerService;

    /** @var LoanService $loanService */
    private LoanService $loanService;

    /** @var AccountService $accountService */
    private AccountService $accountService;

    public function __construct(
        CustomerService $customerService,
        LoanService $loanService,
        AccountService $accountService
    ) {
        $this->customerService = $customerService;
        $this->loanService = $loanService;
        $this->accountService = $accountService;
    }

    public function getLoan(int $sessionId, float $amount): bool
    {
        $result = false;
        $customerData = $this->customerService->getCustomer($sessionId);
        $customerId = (int)$customerData['id'];
        if ($this->customerService->checkId($customerId)) {
            if ($this->loanService->checkCreditRating($customerId, $amount)) {
                if ($this->accountService->getLoan($amount)) {
                    $result = $this->accountService->setCustomerBalance($customerId, $amount);
                }
            }
        }

        return $result;
    }
}
