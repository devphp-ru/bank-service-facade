<?php
declare(strict_types=1);

namespace App\Database;


class DatabaseConnection
{
    /** @var DatabaseConfigurator $databaseConfigurator */
    private DatabaseConfigurator $databaseConfigurator;

    public function __construct(DatabaseConfigurator $databaseConfigurator)
    {
        $this->databaseConfigurator = $databaseConfigurator;
    }

    public function connect(): \PDO
    {
        try {
            return new \PDO(
                $this->constructDSN(),
                $this->databaseConfigurator->username(),
                $this->databaseConfigurator->password(),
                $this->databaseConfigurator->options()
            );
        } catch (\PDOException $e) {
            die ($e->getMessage());
        }
    }

    private function constructDSN(): string
    {
        return sprintf(
            '%s:host=%s;dbname=%s;charset=%s',
            $this->databaseConfigurator->driver(),
            $this->databaseConfigurator->host(),
            $this->databaseConfigurator->dbname(),
            $this->databaseConfigurator->charset()
        );
    }
}
