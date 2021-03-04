<?php

interface IRepository
{
    public function get();
}

class Repository implements IRepository
{
    public $data = 'Hello';
    
    public function get()
    {
        return $this->data;
    }
}

class ArticleRepository extends Repository implements IRepository
{
    public function get()
    {
        return parent::get() . ' , world!';
    }
    
}

class PortfolioRepository extends Repository
{
    
}

// $article = new ArticleRepository;
// echo $article->get();

interface IRepositoryFactory
{
    public function create();
}

class RepositoryFactory implements IRepositoryFactory
{
    public function create()
    {
        return new ArticleRepository;
    }
}

class ArticleController
{
    public function __construct(
        public IRepositoryFactory $factory,
    ) {}
    
    public function index()
    {
        var_dump($this->factory->create());
    }
    // public function __construct(
        // public IRepository $repository
    // ) {}
    
    // public function __construct(
        // public IRepository $repository,
    // )
    // {
        // $this->repository = new ArticleRepository;
    // }
}

(new ArticleController(new RepositoryFactory))->index();