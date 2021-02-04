<?php
namespace Iterator;


class Blog2 implements \IteratorAggregate
{
    private array $posts = [];
    
    private int $position;
    
    public function addPost(Post $post)
    {
        $this->posts[] = $post;
    }
    
    public function getPosts()
    {
        return $this->posts;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->posts);
    }
}