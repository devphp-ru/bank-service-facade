<?php
declare(strict_types=1);

namespace App\Models;


use App\Database\PDOBuilder;

class Customer
{
    /** @var string $tableName */
    private string $tableName = 'customers';

    /** @var PDOBuilder $pdoBuilder */
    private PDOBuilder $pdoBuilder;

    private function __construct()
    {
        $this->pdoBuilder = PDOBuilder::createPDOBuilder();
    }

    public static function create(): Customer
    {
        return new self();
    }

    public function one(int $id): array
    {
        $query = "SELECT * FROM {$this->tableName} WHERE id=:id LIMIT 1";
        $result = $this->pdoBuilder
            ->prepare($query)
            ->execute([':id' => $id])
            ->fetch();

        return $result;
    }

    public function only(string $columnName, $value, ...$items): array
    {
        $fields = implode(', ', $items);
        $query = "SELECT {$fields} FROM {$this->tableName} WHERE {$columnName}=:{$columnName} LIMIT 1";
        $result = $this->pdoBuilder
            ->prepare($query)
            ->execute([":{$columnName}" => $value])
            ->fetch();

        return $result;
    }
}
