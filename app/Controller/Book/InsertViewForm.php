<?php

namespace App\Library\Controller\Book;

class InsertViewForm
{
    public function request()
    {
        $title = "Inserir novo livro";
        require __DIR__ . '/../../../view/livros/form.php';
    }
}