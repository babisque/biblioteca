<?php

namespace App\Library\Controller\Book;

use App\Library\Service\HtmlRenderTrait;

class InsertViewForm
{
    use HtmlRenderTrait;

    public function request()
    {
        if (!isset($_SESSION['loggedin'])) {
            header('Location: /login');
            return;
        }

        echo $this->htmlRender('livros/form.php', [
            'title' => 'Inserir novo livro',
        ]);
    }
}