<?php

namespace App\Library\Controller\Book;

use App\Library\Repository\BookRepository;
use App\Library\Service\ConnectionCreator;
use App\Library\Service\HtmlRenderTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class EditViewForm implements RequestHandlerInterface
{
    use HtmlRenderTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (!isset($_SESSION['loggedin'])) {
            return new Response(302, ['Location' => '/login']);
        }

        $connection = ConnectionCreator::creatorConnection();
        $bookRepository = new BookRepository($connection);

        $id = filter_var($request->getQueryParams()['id'], FILTER_VALIDATE_INT);

        if (is_null($id) || $id === false) {
            return new Response(302, ['Location' => '/']);
        }

        $bookById = $bookRepository->find($id);
        foreach ($bookById as $bookId) {
            $book = $bookId;
        }

        $html = $this->htmlRender('livros/form.php', [
            'book' => $book,
            'title' => "Editar livro " . $book->getTitle(),
        ]);

        return new Response(200, [], $html);
    }
}