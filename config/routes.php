<?php

use App\Library\Controller\Book\{Catalog, Delete, Details, EditViewForm, InsertForm, InsertViewForm};

return [
    '' => Catalog::class,
    '/novo-livro' => InsertViewForm::class,
    '/salvar-livro' => InsertForm::class,
    '/deletar' => Delete::class,
    '/detalhes' => Details::class,
    '/editar-livro' => EditViewForm::class,
];
