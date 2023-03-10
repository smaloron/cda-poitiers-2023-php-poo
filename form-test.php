<?php
require "autoload.php";


$nom = new FormWidget("Votre nom", "nom", "Isadora");
$nom->setDecorator(new DivDecorator);

$age = new NumberWidget("Votre âge", "age", 7, 77);

$form = new Form;
$form->addWiget($nom)
    ->addWiget($age)
    ->addWiget(new ComboWidget("Votre profession", "prof", ["formateur", "sculpteur", "acteur", "plombier"], "acteur"));

$form->hydrate($_POST);

if ($form->isPosted() && $form->isValid()) {
    echo "traitement du formulaire";
} else {
    echo $form->getHTML();
}