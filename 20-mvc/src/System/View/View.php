<?php
namespace App\System\View;


class View implements IView
{
    public function __construct(
        private string $basePath,
        private string $templatePath,
    ) {}

    public function render(string $path, array $params = []): string
    {
        extract($params);

        ob_start();
        
        $fullPath = $this->basePath . '/' 
                  . $this->templatePath . '/'
                  . $path . '.php'; 

        if (!include($fullPath)) {
            throw new \Exception('Path Error');
        }

        return ob_get_clean();
    }
}