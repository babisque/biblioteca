<?php

namespace App\Library\Service;

trait HtmlRenderTrait
{
    public function htmlRender(string $templatePath, array $data): string
    {
        extract($data);
        ob_start();
        require __DIR__ . '/../../view/' . $templatePath;
        $html = ob_get_clean();

        return $html;
    }
}