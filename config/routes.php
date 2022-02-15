<?php

use App\Library\Controller\Login\{Login, LoginFormView, Logout, Register, RegisterFormView};
use App\Library\Controller\Book\{Catalog, Delete, Details, EditViewForm, InsertForm, InsertViewForm};

return [
    '' => Catalog::class,
    '/novo-livro' => InsertViewForm::class,
    '/salvar-livro' => InsertForm::class,
    '/deletar' => Delete::class,
    '/detalhes' => Details::class,
    '/editar-livro' => EditViewForm::class,

    /** Login & register */
    '/login' => LoginFormView::class,
    '/realizar-login' => Login::class,
    '/registrar' => RegisterFormView::class,
    '/realizar-registro' => Register::class,
    '/logout' => Logout::class,
];
