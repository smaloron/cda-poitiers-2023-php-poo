<?php
require_once "classes/FormWidget.php";

class NumberWidget extends FormWidget
{

    public function __construct(
        protected string $label,
        protected string $name,
        protected int $min = 1,
        protected int $max = 100,
        protected string $value = ""
    ) {
    }

    public function getHTML(): string
    {
        $html = "
        <label>{$this->label}</label>
        <input type='number'
        name='{$this->name}' value='{$this->value}'
        min='{$this->min}' max='{$this->max}'>
        ";

        if ($this->decorator instanceof DivDecorator) {
            $html = $this->decorator->getHTML($html);
        }

        return $html;
    }

    public function isValid(): bool
    {
        $valid = parent::isValid();

        return $valid
            && $this->value >= $this->min
            && $this->value <= $this->max;
    }
}
