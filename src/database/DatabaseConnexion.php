<?php

namespace App\database;

class DatabaseConnexion
{
    private $dsn;
    private $username;
    private $password;
    private $pdo;

    public function __construct(string $dsn, string $username, string $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
    } 

    private function connect()
    {
        $this->pdo = new \PDO($this->dsn, $this->username, $this->password);
    }

    public function getPdo(): \PDO
    {
        if (!$this->pdo) {
            $this->connect();
        }

        return $this->pdo;
    }
}
