<?php
declare(strict_types=1);

namespace App\Database;


use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase
{
    public function testCanCreateDConnection(): void
    {
        $config = require __DIR__ . '/../../../config/db.php';
        $databaseConnection = new DatabaseConnection(
            new DatabaseConfigurator($config)
        );
        $this->assertIsObject($databaseConnection);
        $this->assertInstanceOf(\PDO::class, $databaseConnection->connect());
    }
}
