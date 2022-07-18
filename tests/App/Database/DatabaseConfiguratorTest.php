<?php
declare(strict_types=1);

namespace App\Database;


use PHPUnit\Framework\TestCase;

class DatabaseConfiguratorTest extends TestCase
{
    public function testCanCreateDConfigurator(): void
    {
        $config = require __DIR__ . '/../../../config/db.php';
        $databaseConfigurator = new DatabaseConfigurator($config);
        $this->assertIsObject($databaseConfigurator);
        $this->assertEquals('mysql', $databaseConfigurator->driver());
        $this->assertEquals('localhost', $databaseConfigurator->host());
        $this->assertEquals('db-bank', $databaseConfigurator->dbname());
        $this->assertEquals('root', $databaseConfigurator->username());
        $this->assertEquals('', $databaseConfigurator->password());
        $this->assertEquals('utf8mb4', $databaseConfigurator->charset());
        $this->assertIsArray($databaseConfigurator->options());
        $this->assertCount(3, $databaseConfigurator->options());
    }
}
