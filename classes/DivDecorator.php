<?php

class DivDecorator
{

    public function getHtml(string $content): string
    {
        return "<div>$content</div>";
    }
}
