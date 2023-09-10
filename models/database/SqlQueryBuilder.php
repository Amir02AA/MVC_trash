<?php

namespace models\database;


class SqlQueryBuilder
{
    private static ?self $instance = null;
    private \PDO $pdo;
    private array $data = [];

    private string $query;

    private string $table;


    private function __construct()
    {
        $config = SqlConfig::getConfig();
        $this->pdo = new \PDO($config['dsn'], $config['user'], $config['password']);
    }

    public static function getInstance(): self
    {
        return (self::$instance) ?: self::$instance = new self();
    }

    public function select(array $selects = ['*'])
    {
        $selects = implode(',', $selects);
        $this->query = "select $selects from " . $this->table . " ";
        return $this;
    }

    public function insert(array $data)
    {
        $this->data = $data;

        $columns = array_keys($data);
        $placeHolders = implode(',',
            array_map(fn($x) => ":$x", $columns));
        $columns = implode(',', $columns);
        $this->query = "insert into " . $this->table . " ($columns) value ($placeHolders) ";
        return $this;
    }

    public function delete()
    {
        $this->query = 'delete from ' . $this->table . " ";
        return $this;
    }

    public function where(string $column, string $val, string $operator = '=')
    {
        $this->data[$column] = $val;

        $this->query .= " Where $column $operator :$column ";
        return $this;
    }

    public function exec(): bool
    {
        return $this->pdo->prepare($this->query . ";")->execute($this->data);
    }

    public function fetchAll(): array|string
    {
        $stmnt = $this->pdo->prepare($this->query . ";");
        $stmnt->execute($this->data);

        return $stmnt->fetchAll();
    }

    public function table(string $table)
    {
        $this->table = $table;
        $this->data = [];
        return $this;
    }

    public function update(array $values)
    {
        $this->query = 'update ' . $this->table . " set ";
        foreach ($values as $column => $value) {
            $this->query .= $column . "=" . ":$column ,";
        }

        $this->query = substr($this->query, 0, strlen($this->query) - 2);
        $this->data = array_merge($this->data, $values);
        return $this;
    }
}