<?php
namespace Command;


class GoOnline implements ICommand
{
    public function __construct(
        protected User $user,
    ) {}
    
    public function execute()
    {
        $this->user->goOnline();
    }
    
    public function undo()
    {
        $this->user->goOffline();
    }
    
    public function redo()
    {
        $this->execute();
    }
}