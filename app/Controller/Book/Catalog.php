<?php

namespace App\Library\Controller\Book;

use App\Library\Repository\BookRepository;
use App\Library\Service\ConnectionCreator;
use App\Library\Service\HtmlRenderTrait;

class Catalog
{
    use HtmlRenderTrait;

    public function request(): void
    {
        $connection = ConnectionCreator::creatorConnection();
        $bookRepository = new BookRepository($connection);

        $bookList = $bookRepository->read();

        echo $this->htmlRender('livros/catalog.php', [
            'bookList' => $bookRepository->read(),
            'title' => "Catálogo"
        ]);
    }
}