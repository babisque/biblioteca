<?php

namespace App\Library\Controller\Login;

use App\Library\Service\HtmlRenderTrait;

class LoginFormView
{
    use HtmlRenderTrait;

    public function request()
    {
        echo $this->htmlRender('login/login.php', [
            'title' => 'Login'
        ]);
    }
}