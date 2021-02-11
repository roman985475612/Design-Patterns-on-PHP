<?php
namespace Composite;


class FieldSetElement extends ParentFormElement
{
    public function render(): string
    {
        $form = '<fieldset>';
        $form .= parent::render();
        $form .= '</fieldset>';
        
        return $form;
    }
}