<?php
require_once "classes/FormDecorator.php";
require "classes/FormWidget.php";


$nom = new FormWidget("Votre nom", "nom", "Isadora");
$nom->setDecorator(new DivDecorator);

$age = new FormWidget("Votre âge", "age");

echo $nom->getHTML();
echo $age->getHTML();

var_dump($age->isValid());
var_dump($nom->isValid());