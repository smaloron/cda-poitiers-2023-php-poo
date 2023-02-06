<?php

/**
 * Modèlise un ingrédient pour une pizza
 * 
 */
class Ingredient
{

    private string $nom;
    private int $prix;
    private int $categorie;
    public static int $nb = 0;

    public const LEGUME = 1;
    public const VIANDE = 2;

    public function __construct(string $nom, int $prix, int $categorie)
    {
        $this->nom = $nom;
        $this->prix = $prix;
        $this->categorie = $categorie;
        self::$nb++;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrix(): int
    {
        return $this->prix;
    }

    public function estVegetarien()
    {
        return $this->categorie === self::LEGUME;
    }
}

class Pizza
{

    private string $nom;

    private array $listeIngredients = [];

    public function __construct(string $nom)
    {
        $this->nom = $nom;
    }

    public function ajouterIngredient(Ingredient $ingredient)
    {
        array_push($this->listeIngredients, $ingredient);
    }

    public function getPrix(): int
    {
        $prix = 0;
        foreach ($this->listeIngredients as $ingredient) {
            $prix += $ingredient->getPrix();
        }
        return $prix;
    }

    private function getListeDesIngredients(): string
    {
        $ingredients = array_map(
            function ($element) {
                return $element->getNom();
            },
            $this->listeIngredients
        );

        return implode(" et ", $ingredients);
    }

    public function __toString(): string
    {
        return "pizza {$this->nom} avec {$this->getListeDesIngredients()} qui coûte {$this->getPrix()}€";
    }

    public function isVege(): bool
    {
        $vegetarien = true;
        foreach ($this->listeIngredients as $element) {
            if (!$element->estVegetarien()) {
                $vegetarien = false;
                break;
            }
        }

        return $vegetarien;
    }
}
