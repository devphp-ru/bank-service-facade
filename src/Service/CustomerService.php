<?php
declare(strict_types=1);

namespace App\Service;


use App\Database\PDOBuilder;

class CustomerService
{
    /** @var string $tableName */
    private string $tableName = 'customers';

    private PDOBuilder $pdoBuilder;

    public function __construct()
    {
        $this->pdoBuilder = PDOBuilder::createPDOBuilder();
    }

    public function getCustomer(int $sessionId): array
    {
        $query = "SELECT * FROM {$this->tableName} WHERE id=:id LIMIT 1";
        $result = $this->pdoBuilder
            ->prepare($query)
            ->execute([':id' => $sessionId])
            ->fetch();
        return $result;
    }

    public function checkId(int $customerId): bool
    {
        $query = "SELECT id FROM {$this->tableName} WHERE id=:id LIMIT 1";
        $result = $this->pdoBuilder
            ->prepare($query)
            ->execute([':id' => $customerId])
            ->fetch();
        return (bool)$result;
    }
}
