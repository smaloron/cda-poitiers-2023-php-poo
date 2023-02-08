<?php
require "autoload.php";

$pdo = new PDO(
    "mysql:host=localhost;dbname=cda_poitiers_2023_sql;charset=utf8",
    "root",
    "",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);

$form = new Form;
$form->addWiget(new FormWidget("votre rue", "rue"))
    ->addWiget(new FormWidget("Votre codepostal", "code_postal"))
    ->addWiget(new FormWidget("Votre ville", "ville"));

$form->hydrate($_POST);

if ($form->isPosted() && $form->isValid()) {
    $newAddress = $form->getData();
    $qb = new QueryBuilder($pdo);

    $qb->insert($newAddress)->into("adresses")->execute();

    echo "Insertion ok";
}

echo $form->getHTML();