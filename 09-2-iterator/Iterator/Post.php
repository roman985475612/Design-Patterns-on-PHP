<?php
namespace Iterator;


class Post
{
    public function __construct(
        private string $title,
        private string $text,
        private string $author,
    ) {}
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function getText()
    {
        return $this->text;
    }
    
    public function getAuthor()
    {
        return $this->author;
    }
}