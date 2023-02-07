<?php
require "autoload.php";

$pdo = new PDO(
    "mysql:host=localhost;dbname=formation_sql;charset=utf8",
    "root",
    "",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);

$qb = new QueryBuilder($pdo);

$qb->select("*")
    ->from("personnes");

echo $qb->getSQL();

var_dump($qb->execute()->getAll());