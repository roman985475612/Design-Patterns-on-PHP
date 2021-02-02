<?php
namespace Observer;

class Blog implements \SplSubject
{
    public string $title;
    
    public string $text;
    
    private array $observers = [];
    
    public function __construct() 
    {
        $this->observers['all'] = [];
    }
    
    public function attach( \SplObserver $observer, string $event = 'all')
    {
        if (!isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }
        $this->observers[$event][] = $observer;
    }
    
    public function detach( \SplObserver $observer, string $event = 'all')
    {
        if (!isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }
        $observers = array_merge($this->observers[$event], $this->observers['all']);
        
        foreach ($observers as $key => $value) {
            if ($observer === $value) {
                unser($observers[$event][$key]);
            }
        }
    }
    
    public function notify(string $event = 'all')
    {
        if (!isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }
        $observers = array_merge($this->observers[$event], $this->observers['all']);
        
        foreach ($observers as $key => $value) {
            $value->update($this, $event);
        }
        
    }
    
    public function create()
    {
        echo 'create';
        $this->notify('blog:create');
    }
    
    public function update()
    {
        echo 'update';
        $this->notify('blog:update');
    }
    
    public function delete()
    {
        echo 'delete';
        $this->notify('blog:delete');
    }
}