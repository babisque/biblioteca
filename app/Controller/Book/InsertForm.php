<?php

namespace App\Library\Controller\Book;

use App\Library\Entity\Book;
use App\Library\Repository\BookRepository;
use App\Library\Service\ConnectionCreator;
use App\Library\Service\FlashMessageTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class InsertForm implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (!isset($_SESSION['loggedin'])) {
            return new Response(302, ['Location' => '/login']);
        }

        $connection = ConnectionCreator::creatorConnection();
        $bookRepository = new BookRepository($connection);

        $connection->beginTransaction();

        $queryString = $request->getQueryParams();

        if (isset($queryString['id'])) {
            $id = filter_var($request->getQueryParams()['id'], FILTER_VALIDATE_INT);
        } else {
            $id = null;
        }

        try {
            $book = new Book(
              $id,
              $_POST['booktitle'],
              $_POST['bookauthor'],
              new \DateTimeImmutable($_POST['releasedate']),
              $_POST['company'],
              $_POST['image'],
              $_POST['synopsis']
            );

            $bookRepository->save($book);
            $connection->commit();

            if (!is_null($id) && $id !== false) {
                $this->messageDefine('success', 'Livro atualizado com sucesso.');
            } else {
                $this->messageDefine('success', 'Livro inserido com sucesso.');
            }

            return new Response(302, ['Location' => '/']);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            $connection->rollBack();
            return new Response(404);
        }
    }
}