<?php
require_once "classes/FormWidget.php";

class Form
{
    /**
     * Liste des contrôles de formulaire
     *
     * @var FormWidget[] | Array<FormWidget>
     */
    private array $widgets;

    public function __construct(
        private string $method = "post",
        private string $action = ""
    ) {
    }

    /**
     * Ajout d'un champ au formulaire
     * Les champs sont stockés dans un tableau asociatif 
     * dont les clefs sont les attributs name des champs
     *
     * @param FormWidget $widget
     * @return self
     */
    public function addWiget(FormWidget $widget): Form
    {
        $this->widgets[$widget->getName()] = $widget;
        return $this;
    }
}