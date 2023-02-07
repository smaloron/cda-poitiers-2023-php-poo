<?php


class ComboWidget extends FormWidget
{

    public function __construct(
        protected string $label,
        protected string $name,
        protected array $data,
        protected string $value = ""
    ) {
    }

    private function getOptions(): string
    {
        $option = "";
        foreach ($this->data as $item) {
            $selected = $item === $this->value ? "selected='selected'" : "";
            $option .= "<option $selected value='$item'>$item</option>";
        }
        return $option;
    }

    public function getHTML(): string
    {
        $html = "
        <label>{$this->label}</label>
        <select name='{$this->name}' value='{$this->value}'>
            {$this->getOptions()}
        </select>
        ";

        if ($this->decorator instanceof DivDecorator) {
            $html = $this->decorator->getHTML($html);
        }

        return $html;
    }
}