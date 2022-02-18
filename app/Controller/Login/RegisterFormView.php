<?php

namespace App\Library\Controller\Login;

use App\Library\Service\HtmlRenderTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RegisterFormView implements RequestHandlerInterface
{
    use HtmlRenderTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->htmlRender('login/register.php', [
            'title' => 'Registrar-se'
        ]);

        return new Response(200, [], $html);
    }
}