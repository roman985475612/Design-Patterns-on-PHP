<?php
namespace Strategy;

class BaseLogic
{
    public function __construct(
        private IFileSaver $saver,
    ) {}
    
    public function execute(): bool
    {
        $this->saver->save();
        return true;
    }
}