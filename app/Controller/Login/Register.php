<?php

namespace App\Library\Controller\Login;

use App\Library\Entity\User;
use App\Library\Repository\UserRepository;
use App\Library\Service\ConnectionCreator;

class Register
{
    public function request()
    {
        $connection = ConnectionCreator::creatorConnection();
        $userRepository = new UserRepository($connection);

        $connection->beginTransaction();

        try {
            $user = new User(
                $_POST['emailLogin'],
                $_POST['passwordLogin'],
                null
            );

            $userRepository->register($user);
            $connection->commit();

            header('Location: /login', true, 302);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            $connection->rollBack();
        }
    }
}