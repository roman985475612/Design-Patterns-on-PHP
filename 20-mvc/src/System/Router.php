<?php
namespace App\System;


class Router
{
    private $action;

    private $params;

    private $controller;

    private $requestUrl = '';

    public function __construct() {
        $request = $_SERVER['REQUEST_URI'];

        $this->requestUrl = substr($request, strlen(SITE_URL));

        $url = explode("/", rtrim($this->requestUrl, '/'));
        
        $this->controller = "App\\Controller\\";

        if (!empty($url[0])) {
            $this->controller .= ucfirst($url[0]) . 'Controller';
        } else {
            $this->controller .= 'IndexController';
        }

        if (!empty($url[1])) {
            $this->action .= $url[1] . 'Action';
        } else {
            $this->action .= 'indexAction';
        }

        if (!empty($url[2])) {
            $count = count($url);

            $key = [];
            $value = [];

            for ($i = 2; $i < $count; $i++) {
                if ($i % 2 == 0) {
                    $key[] = $url[$i];
                } else {
                    $value[] = $url[$i];
                }
            }
        }

        if (!$this->params = array_combine($key, $value)) {
            throw new \Exception('Error request');
        }
    }

    public function processRequest()
    {
        print_r($this->params);
    }
}