<?php

class QueryBuilder
{
    private string $tableName;
    private string $fieldList;
    private string $verb;

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

    public function getSQL()
    {
        return "{$this->verb} {$this->fieldList} FROM {$this->tableName} ;";
    }

    public function execute()
    {
        $statement = $this->pdo->prepare($this->getSQL());
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}