<?php

namespace App\Library\Controller\Login;

use App\Library\Entity\User;
use App\Library\Repository\UserRepository;
use App\Library\Service\ConnectionCreator;
use App\Library\Service\FlashMessageTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Register implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $connection = ConnectionCreator::creatorConnection();
        $userRepository = new UserRepository($connection);

        $connection->beginTransaction();

        $email = filter_var($request->getParsedBody()['emailLogin'], FILTER_VALIDATE_EMAIL);
        $password = filter_var($request->getParsedBody()['passwordLogin'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        try {
            $user = new User(
                $email,
                $password,
                null
            );

            $userRepository->register($user);
            $connection->commit();

            return new Response(302, ['Location' => '/login']);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            $connection->rollBack();
            return new Response(404);
        }
    }
}