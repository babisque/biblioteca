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

class Login implements RequestHandlerInterface
{
    use FlashMessageTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $connection = ConnectionCreator::creatorConnection();
        $userRepository = new UserRepository($connection);

        $email = filter_var($request->getParsedBody()['emailLogin'], FILTER_VALIDATE_EMAIL);
        $password = $request->getParsedBody()['passwordLogin'];

        if (is_null($email) || $email === false) {
            $this->messageDefine('danger', 'E-mail incorreto.');
            return new Response(401, ['Location' => '/login']);
        }

        /** @var User $user */
        $user = $userRepository->findUser($email);

        if (!password_verify($password, $user['password'])) {
            $this->messageDefine('danger', 'Email ou senha incorretas');
            return new Response(401, ['Location' => '/login']);
        }

        $_SESSION['loggedin'] = true;

        return new Response(302, ['Location' => '/']);
    }
}