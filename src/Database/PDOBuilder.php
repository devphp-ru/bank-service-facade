<?php
declare(strict_types=1);

namespace App\Database;


class PDOBuilder
{
    /** @var \PDO $dbh */
    private \PDO $dbh;

    /** @var \PDOStatement|null $sth */
    private ?\PDOStatement $sth;

    private function __construct()
    {
        $this->dbh = (new DatabaseConnectionFactory())->create()->connect();
    }

    public static function createPDOBuilder(): PDOBuilder
    {
        return new self();
    }

    public function exec(string $query): int
    {
        return $this->dbh->exec($query);
    }

    public function prepare(string $query): self
    {
        $this->sth = $this->dbh->prepare($query);
        return $this;
    }

    public function execute(array $binds = []): self
    {
        $this->sth->execute($binds);
        return $this;
    }

    public function fetch(): array
    {
        $result = $this->sth->fetch();
        $this->sth = null;
        return ($result === false) ? [] : $result;
    }

    public function fetchAll(): array
    {
        $result = $this->sth->fetchAll();
        $this->sth = null;
        return ($result === false) ? [] : $result;
    }

    public function rowCount(): int
    {
        $result = $this->sth->rowCount();
        $this->sth = null;
        return $result;
    }

    public function lastInsertId(): int
    {
        return (int)$this->dbh->lastInsertId();
    }
}
