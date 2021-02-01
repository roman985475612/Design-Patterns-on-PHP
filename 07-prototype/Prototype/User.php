<?php
namespace Prototype;

class User
{
    private array $posts = [];
    
    public function __construct(
        private string $firstname
    ) {}
    
    public function addPost(Post $post) 
    {
        $this->posts[] = $post;
    }
}