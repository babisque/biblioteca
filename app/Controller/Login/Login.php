<?php

namespace App\Library\Controller\Login;

use App\Library\Entity\User;
use App\Library\Repository\UserRepository;
use App\Library\Service\ConnectionCreator;

class Login
{
    public function request()
    {
        $connection = ConnectionCreator::creatorConnection();
        $userRepository = new UserRepository($connection);

        $email = filter_input(INPUT_POST, 'emailLogin', FILTER_VALIDATE_EMAIL);
        $password = $_POST['passwordLogin'];

        if (is_null($email) || $email === false) {
            echo 'Email incorreto';
            return;
        }

        /** @var User $user */
        $user = $userRepository->findUser($email);

        if (!password_verify($password, $user['password'])) {
            echo 'Senha incorreta';
            return;
        }

        $_SESSION['loggedin'] = true;

        header('Location: /');
    }
}