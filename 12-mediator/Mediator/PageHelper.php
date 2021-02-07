<?php
namespace Mediator;


class PageHelper implements IHelper
{
    public function __construct(
        public Data $data,
        public Page $page,
        public Router $router,
    ) {
        $this->data->setPageHelper($this);
        $this->page->setPageHelper($this);
        $this->router->setPageHelper($this);
    }
    
    public function sendResponse(string $content)
    {
        $this->router->output($content);
    }
    
    public function getRequest()
    {
        $this->page->render();
    }
    
    public function getData()
    {
        return $this->data->getData();
    }

}