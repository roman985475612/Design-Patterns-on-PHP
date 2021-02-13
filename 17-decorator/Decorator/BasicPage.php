<?php
namespace Decorator;


class BasicPage implements IPage
{
    public function __construct(
        private string $title,
    ) {}
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function render()
    {
        return " Basic page ";
    }
}