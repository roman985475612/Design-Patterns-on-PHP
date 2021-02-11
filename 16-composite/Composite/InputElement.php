<?php
namespace Composite;


class InputElement extends SimpleFormElement
{
    public function __construct(
        private string $id,
    ) {}
    
    public function render(): string
    {
        return '<input id="' . $this->id . '" type="text">';
    }
}