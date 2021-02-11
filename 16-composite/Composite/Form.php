<?php
namespace Composite;


class Form extends ParentFormElement
{
    public function render(): string
    {
        $form = '<form>';
        $form .= parent::render();
        $form .= '</form>';
        
        return $form;
    }
}