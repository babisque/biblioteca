<?php

namespace App\Library\Controller\Book;

use App\Library\Controller\ControllerHtml;
use App\Library\Repository\BookRepository;
use App\Library\Service\ConnectionCreator;

class EditViewForm extends ControllerHtml
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

        echo $this->htmlRender('livros/form.php', [
            'book' => $book,
            'title' => "Editar livro " . $book->getTitle(),
        ]);
    }
}