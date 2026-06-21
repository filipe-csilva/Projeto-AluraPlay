<?php

namespace Alura\Mvc\Helper;

trait HtmlRendererTrait
{
    protected function renderTemplate(string $templateName, array $context = []): string{
        $templateName = __DIR__ . '/../../views/';
        extract($context);
        
        ob_start();
        require_once $templateName . $templateName . '.php';
        return ob_get_clean();
    }
    
}
