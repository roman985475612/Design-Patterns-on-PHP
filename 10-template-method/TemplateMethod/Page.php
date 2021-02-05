<?php
namespace TemplateMethod;

abstract class Page
{
    protected string $header;
    
    protected string $footer;
    
    protected string $content;
    
    protected string $page;
    
    abstract public function setContent();
    
    protected function setHeader()
    {
        $this->header = $this->render('header', []);
    }
    
    protected function setFooter()
    {
        $this->footer = $this->render('footer', []);
    }
    
    protected function render(string $path, array $param = [])
    {
        extract($param);
        
        ob_start();
        
        if (!file_exists("theme/{$path}.php")) {
            throw new \Exception('Error');
        }
        
        include "theme/{$path}.php";
        
        return ob_get_clean();
    }
    
    public function output()
    {
        $this->setHeader();
        
        $this->setContent();
        
        $this->setFooter();
        
        $this->page = $this->render('main', [
            'header'  => $this->header,
            'content' => $this->content,
            'footer'  => $this->footer,
        ]);
        
        return $this->getPage();
    }
    
    public function getPage()
    {
        echo $this->page;
    }
    
    
}