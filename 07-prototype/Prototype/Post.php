<?php
namespace Prototype;

class Post implements IPost
{
    private array $comments = [];
    
    private \DateTime $created_at;
    
    public function __construct(
        private string $title,
        private string $text,
        private User $user,
    ) {
        $this->created_at = new \DateTime;
        
        $this->user->addPost($this);
    }
    
    public function addComment(string $comment)
    {
        $this->comments[] = $comment;
    }
    
    public function __clone()
    {
        $this->title = $this->title . ' - copy';
        $this->user->addPost($this);
        $this->comments = [];
        $this->created_at = new \DateTime;
    }
}