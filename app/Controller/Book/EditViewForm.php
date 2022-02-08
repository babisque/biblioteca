<?php

namespace App\Library\Controller\Book;

use App\Library\Repository\BookRepository;
use App\Library\Service\ConnectionCreator;

class EditViewForm
{
    public function request()
    {
        $connection = ConnectionCreator::creatorConnection();
        $bookRepository = new BookRepository($connection);

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (is_null($id) || $id === false) {
            header('Location: /');
            return;
        }

        $bookById = $bookRepository->find($id);
        foreach ($bookById as $bookId) {
            $book = $bookId;
        }

        $title = "Editar livro " . $book->getTitle();
        require __DIR__ . '/../../../view/livros/form.php';
    }
}