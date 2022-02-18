<?php

namespace App\Library\Controller\Book;

use App\Library\Repository\BookRepository;
use App\Library\Service\ConnectionCreator;
use App\Library\Service\HtmlRenderTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Catalog implements RequestHandlerInterface
{
    use HtmlRenderTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $connection = ConnectionCreator::creatorConnection();
        $bookRepository = new BookRepository($connection);

        $html = $this->htmlRender('livros/catalog.php', [
            'bookList' => $bookRepository->read(),
            'title' => "Catálogo"
        ]);

        return new Response(200, [], $html);
    }
}