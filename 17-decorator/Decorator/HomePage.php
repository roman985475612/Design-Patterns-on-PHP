<?php
namespace Decorator;


class HomePage extends PageDecorator
{
    public function getTitle()
    {
        return "<br>" . $this->page->getTitle() . " | Home Page" . "<br>";
    }
    
    public function render()
    {
        return $this->page->render() . " | Home Page" . "<br>";
    }
}
