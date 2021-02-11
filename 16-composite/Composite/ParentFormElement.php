<?php
namespace Composite;


abstract class ParentFormElement implements IFormRender
{
    private array $inputs;
    
    public function render(): string
    {
        $form = '';
        
        foreach ($this->inputs as $input) {
            $form .= $input->render();
        }
        
        return $form;
    }
    
    public function addInput(IFormRender $input)
    {
        $this->inputs[] = $input;
    }    
}