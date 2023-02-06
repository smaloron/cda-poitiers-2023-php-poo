<?php

class Personne
{
    private string $nom;
    private string $prenom;

    public function __construct(string $prenom, string $nom)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
    }
}

class Voiture
{
    private string $modele;
    private int $vitesse = 0;
    private Personne | null $pilote = null;

    public function __construct(string $modele, int $vitesse)
    {
        $this->modele = $modele;
        $this->setVitesse($vitesse);
    }

    public function rouler(float $heures)
    {
        if ($this->pilote instanceof Personne) {
            $distance = $heures * $this->vitesse;
            echo "{$this->modele} a parcouru $distance km\n";
        } else {
            throw new Exception("On ne peut rouler sans pilote \n");
        }
    }

    public function setVitesse(int $vitesse)
    {
        if ($vitesse > 10 && $vitesse < 300) {
            $this->vitesse = $vitesse;
        } else {
            throw new Exception("Vitesse incohérente");
        }
    }

    public function setPilote(Personne $personne)
    {
        $this->pilote = $personne;
    }
}

try {


    $vroum = new Voiture("Skoda Fabia", 130);
    $vroum->setPilote(new Personne("Ayrton", "Senna"));
    $teufteuf = new Voiture("Panhard 2", 50);
    var_dump($vroum);

    $vroum->rouler(2);
    $teufteuf->rouler(2);
} catch (Exception $ex) {
    echo $ex->getMessage();
}