<?php
namespace Mediator;


interface IHelper
{
    public function sendResponse(string $content);
    
    public function getRequest();
    
    public function getData();
}