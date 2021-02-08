<?php
namespace Command;


class GoOffline implements ICommand
{
    public function __construct(
        protected User $user,
    ) {}
    
    public function execute()
    {
        $this->user->goOffline();
    }
    
    public function undo()
    {
        $this->user->goOnline();
    }
    
    public function redo()
    {
        $this->execute();
    }
}