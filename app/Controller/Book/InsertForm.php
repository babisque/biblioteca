<?php

namespace App\Library\Controller\Book;

use App\Library\Entity\Book;
use App\Library\Repository\BookRepository;
use App\Library\Service\ConnectionCreator;
use App\Library\Service\FlashMessageTrait;

class InsertForm
{
    use FlashMessageTrait;

    public function request()
    {
        $connection = ConnectionCreator::creatorConnection();
        $bookRepository = new BookRepository($connection);

        $connection->beginTransaction();

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

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

            header('Location: /', true, 302);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            $connection->rollBack();
        }
    }
}