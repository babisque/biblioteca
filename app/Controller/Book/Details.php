<?php

namespace App\Library\Controller\Book;

use App\Library\Repository\BookRepository;
use App\Library\Service\ConnectionCreator;

class Details
{
    public function request(): void
    {
        $connection = ConnectionCreator::creatorConnection();
        $bookRepository = new BookRepository($connection);

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $bookId = $bookRepository->find($id);;

        foreach ($bookId as $books) {
            $book = $books;
        }

        $title = $book->getTitle() . ' - Detalhes';
        require __DIR__ . '/../../../view/livros/details.php';
    }
}