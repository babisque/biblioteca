<?php

namespace App\Library\Controller\Book;

use App\Library\Controller\ControllerHtml;
use App\Library\Repository\BookRepository;
use App\Library\Service\ConnectionCreator;

class Details extends ControllerHtml
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

        echo $this->htmlRender('livros/details.php', [
            'book' => $book,
            'title' => $title = $book->getTitle() . ' - Detalhes'
        ]);
    }
}