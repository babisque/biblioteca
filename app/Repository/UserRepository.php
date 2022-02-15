<?php

namespace App\Library\Repository;

use App\Library\Entity\User;

class UserRepository
{
    private \PDO $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function register(User $user): bool
    {
        $insertQuery = "INSERT INTO user (email, password, permission) VALUES (:email, :password, :permission);";
        $statement = $this->connection->prepare($insertQuery);

        $success = $statement->execute([
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword(),
            ':permission' => $user->getPermission()
        ]);

        return $success;
    }

    public function findUser(string $email)
    {
        $query = "SELECT * FROM user WHERE email = ?;";
        $statement = $this->connection->prepare($query);
        $statement->bindValue(1, $email);
        $statement->execute();

        return $statement->fetch();
    }
}