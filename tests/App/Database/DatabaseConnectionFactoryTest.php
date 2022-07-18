<?php
declare(strict_types=1);

namespace App\Database;


use PHPUnit\Framework\TestCase;

class DatabaseConnectionFactoryTest extends TestCase
{
    public function testCanCreateDConnection(): void
    {
        $this->assertInstanceOf(DatabaseConnection:: class, (new DatabaseConnectionFactory())->create());
    }
}
