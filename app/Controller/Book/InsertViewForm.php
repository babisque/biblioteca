<?php

namespace App\Library\Controller\Book;

use App\Library\Controller\ControllerHtml;

class InsertViewForm extends ControllerHtml
{
    public function request()
    {
        echo $this->htmlRender('livros/form.php', [
            'title' => 'Inserir novo livro',
        ]);
    }
}