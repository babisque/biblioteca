<?php

namespace App\Library\Controller\Book;

use App\Library\Repository\BookRepository;
use App\Library\Service\ConnectionCreator;
use App\Library\Service\FlashMessageTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Delete implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (!isset($_SESSION['loggedin'])) {
            return new Response(302, ['Location' => '/login']);
        }

        $connection = ConnectionCreator::creatorConnection();
        $bookRepository = new BookRepository($connection);

        $id = filter_var($request->getQueryParams()['id'], FILTER_VALIDATE_INT);

        $connection->beginTransaction();

        try {
            $bookRepository->delete($id);
            $connection->commit();

            $this->messageDefine('danger', 'Livro excluído com sucesso.');

            return new Response(302, ['Location' => '/']);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            $connection->rollBack();
            return new Response(404);
        }
    }
}