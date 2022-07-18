<?php
declare(strict_types=1);

namespace App\Database;


final class DatabaseConfigurator
{
    /** @var string $driver */
    private string $driver;

    /** @var string $host */
    private string $host;

    /** @var string $dbname */
    private string $dbname;

    /** @var string $username */
    private string $username;

    /** @var string $password */
    private string $password;

    /** @var string $charset */
    private string $charset;

    /** @var array $options */
    private array $options;

    public function __construct(array $config)
    {
        $this->driver = $config['driver'];
        $this->host = $config['host'];
        $this->dbname = $config['dbname'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->charset = $config['charset'];
        $this->options = $config['options'];
    }

    public function driver(): string
    {
        return $this->driver;
    }

    public function host(): string
    {
        return $this->host;
    }

    public function dbname(): string
    {
        return $this->dbname;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function charset(): string
    {
        return $this->charset;
    }

    public function options(): array
    {
        return $this->options;
    }
}
