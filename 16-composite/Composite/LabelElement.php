<?php
namespace Composite;


class LabelElement extends SimpleFormElement
{
    public function __construct(
        private string $for,
        private string $text,
    ) {}
    
    public function render(): string
    {
        return '<label for="' . $this->for . '">' . $this->text . '</label>';
    }
}