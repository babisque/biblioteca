<?php

namespace App\Library\Controller\Login;

use App\Library\Service\HtmlRenderTrait;

class RegisterFormView
{
    use HtmlRenderTrait;

    public function request()
    {
        echo $this->htmlRender('login/register.php', [
            'title' => 'Registrar-se'
        ]);
    }
}