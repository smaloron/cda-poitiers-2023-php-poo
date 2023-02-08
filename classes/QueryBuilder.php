<?php

class QueryBuilder
{
    private string $tableName;
    private string $fieldList;
    private string $verb;
    private PDOStatement $statement;
    private string $where;
    private array $params = [];

    public function __construct(private PDO $pdo)
    {
    }



    public function select(string $fields): self
    {
        $this->fieldList = $fields;
        $this->verb = "SELECT";
        return $this;
    }

    public function from(string $table): self
    {
        $this->tableName = "`" . $table . "`";
        return $this;
    }

    public function where(string $where): self
    {
        $this->where = $where;
        return $this;
    }

    public function setParams(array $params): self
    {
        $this->params = $params;
        return $this;
    }

    public function into(string $table): self
    {
        $this->tableName = "`$table`";
        return $this;
    }

    public function insert(array $data): self
    {
        $this->verb = "INSERT";
        $this->params = $data;
        return $this;
    }

    private function getSELECT(): string
    {
        $sql = "{$this->verb} {$this->fieldList} FROM {$this->tableName}";
        if (!empty($this->where)) {
            $sql .= " WHERE {$this->where}";
        }

        return $sql;
    }

    private function getINSERT(): string
    {
        $columns = array_keys($this->params);
        $placeholders = array_map(
            function ($item) {
                return ":$item";
            },
            $columns
        );

        $columnString = implode(",", $columns);
        $holderString = implode(",", $placeholders);

        return "INSERT INTO {$this->tableName} ($columnString) VALUES ($holderString)";
    }

    public function getSQL(): string
    {
        $methodName = "get" . $this->verb;
        if (method_exists($this, $methodName)) {
            return $this->$methodName();
        } else {
            throw new NotImplentedException("la méthode $methodName n'exise pas");
        }
    }

    public function execute()
    {
        $this->statement = $this->pdo->prepare($this->getSQL());
        $this->statement->execute($this->params);
        return $this;
    }

    public function getAll()
    {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne()
    {
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }
}