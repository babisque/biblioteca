<?php

namespace App\Library\Controller\Login;

class Logout
{
    public function request()
    {
        session_destroy();
        header('Location: /login');
    }
}