<?php

namespace App\Library\Controller\Login;

use App\Library\Service\HtmlRenderTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoginFormView implements RequestHandlerInterface
{
    use HtmlRenderTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->htmlRender('login/login.php', [
            'title' => 'Login'
        ]);

        return new Response(200, [], $html);
    }
}