<?php
require "classes/Pizza.php";
//require "classes/Voiture.php";

$poivron = new Ingredient("poivron", 3, Ingredient::LEGUME);

$tomate = new Ingredient("tomate", 1, Ingredient::LEGUME);

$pizza = new Pizza("Végétarienne");

$pizza->ajouterIngredient($poivron);
$pizza->ajouterIngredient(new Ingredient("champignon", 4, Ingredient::LEGUME));

$pizza->ajouterIngredient(
    new Ingredient("poulet", 5, Ingredient::VIANDE)
);

echo $pizza;

echo "<p>Il y a {$poivron::$nb} instances d'Ingredient</p>";

var_dump($pizza->isVege());