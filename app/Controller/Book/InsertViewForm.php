<?php

namespace App\Library\Controller\Book;

use App\Library\Service\HtmlRenderTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class InsertViewForm implements RequestHandlerInterface
{
    use HtmlRenderTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (!isset($_SESSION['loggedin'])) {
            return new Response(302, ['Location' => '/login']);
        }

        $html = $this->htmlRender('livros/form.php', [
            'title' => 'Inserir novo livro',
        ]);

        return new Response(200, [], $html);
    }
}