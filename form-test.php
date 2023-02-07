<?php
require_once "classes/FormDecorator.php";
require "classes/FormWidget.php";
require "classes/Form.php";


$nom = new FormWidget("Votre nom", "nom", "Isadora");
$nom->setDecorator(new DivDecorator);

$age = new FormWidget("Votre âge", "age");

$form = new Form;
$form->addWiget($nom)
    ->addWiget($age)
    ->addWiget(new FormWidget("Votre profession", "prof"));

var_dump($form);

echo $form->getHTML();