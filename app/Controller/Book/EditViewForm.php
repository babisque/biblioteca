<?php

namespace App\Library\Controller\Book;

use App\Library\Repository\BookRepository;
use App\Library\Service\ConnectionCreator;
use App\Library\Service\HtmlRenderTrait;

class EditViewForm
{
    use HtmlRenderTrait;

    public function request()
    {
        if (!isset($_SESSION['loggedin'])) {
            header('Location: /login');
            return;
        }

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