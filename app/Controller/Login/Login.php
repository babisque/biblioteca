<?php

namespace App\Library\Controller\Login;

use App\Library\Entity\User;
use App\Library\Repository\UserRepository;
use App\Library\Service\ConnectionCreator;
use App\Library\Service\FlashMessageTrait;

class Login
{
    use FlashMessageTrait;

    public function request()
    {
        $connection = ConnectionCreator::creatorConnection();
        $userRepository = new UserRepository($connection);

        $email = filter_input(INPUT_POST, 'emailLogin', FILTER_VALIDATE_EMAIL);
        $password = $_POST['passwordLogin'];

        if (is_null($email) || $email === false) {
            $this->messageDefine('danger', 'E-mail incorreto.');
            header('Location: /login');
            return;
        }

        /** @var User $user */
        $user = $userRepository->findUser($email);

        if (!password_verify($password, $user['password'])) {
            $this->messageDefine('danger', 'Email ou senha incorretas');
            header('Location: /login');
            return;
        }

        $_SESSION['loggedin'] = true;

        header('Location: /');
    }
}