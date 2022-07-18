<?php
declare(strict_types=1);

namespace App\Database;


class DatabaseConnectionFactory
{
    public function create(): DatabaseConnection
    {
        $config = require __DIR__ . '/../../config/db.php';
        return new DatabaseConnection(
            new DatabaseConfigurator($config)
        );
    }
}
