<?php

namespace App\Library\Controller\Book;

use App\Library\Entity\Book;
use App\Library\Repository\BookRepository;
use App\Library\Service\ConnectionCreator;
use App\Library\Service\FlashMessageTrait;

class Delete
{
    use FlashMessageTrait;

    public function request()
    {
        if (!isset($_SESSION['loggedin'])) {
            header('Location: /login');
            return;
        }

        $connection = ConnectionCreator::creatorConnection();
        $bookRepository = new BookRepository($connection);

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $connection->beginTransaction();

        try {
            $bookRepository->delete($id);
            $connection->commit();

            $this->messageDefine('danger', 'Livro excluído com sucesso.');

            header('Location: /', true, 302);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            $connection->rollBack();
        }
    }
}