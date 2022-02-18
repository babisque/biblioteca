<?php

namespace App\Library\Controller\Book;

use App\Library\Repository\BookRepository;
use App\Library\Service\ConnectionCreator;
use App\Library\Service\HtmlRenderTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Details implements RequestHandlerInterface
{
    use HtmlRenderTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $connection = ConnectionCreator::creatorConnection();
        $bookRepository = new BookRepository($connection);

        $id = filter_var($request->getQueryParams()['id'], FILTER_VALIDATE_INT);
        $bookId = $bookRepository->find($id);;

        foreach ($bookId as $books) {
            $book = $books;
        }

        $html = $this->htmlRender('livros/details.php', [
            'book' => $book,
            'title' => $title = $book->getTitle() . ' - Detalhes'
        ]);

        return new Response(200, [], $html);
    }
}