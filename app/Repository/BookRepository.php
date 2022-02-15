<?php

namespace App\Library\Repository;

use App\Library\Entity\Book;
use PDO;

class BookRepository
{
    private PDO $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function save(Book $book): bool
    {
        if ($book->getId() === null) {
            return $this->create($book);
        }

        return $this->update($book);
    }

    public function create(Book $book): bool
    {
        $insertQuery = "INSERT INTO books (title, author, date, company, image, synopsis) VALUES (:title, :author, :date_release, :company, :image, :synopsis);";
        $statement = $this->connection->prepare($insertQuery);

        $success = $statement->execute([
            ':title' => $book->getTitle(),
            ':author' => $book->getAuthor(),
            ':date_release' => $book->getDate()->format('Y-m-d'),
            ':company' => $book->getCompany(),
            ':image' => $book->getImage(),
            ':synopsis' => $book->getSynopsis()
        ]);

        if ($success) {
            $book->setId($this->connection->lastInsertId());
        }

        return $success;
    }

    public function update(Book $book): bool
    {
        $updateQuery = "UPDATE books SET title = :title, author = :author, date = :release_date, company = :company, synopsis = :synopsis WHERE id = :id;";
        $statement = $this->connection->prepare($updateQuery);

        return $statement->execute([
            ':title' => $book->getTitle(),
            ':author' => $book->getAuthor(),
            ':release_date' => $book->getDate()->format('Y-m-d'),
            ':company' => $book->getCompany(),
            ':synopsis' => $book->getSynopsis(),
            ':id' => $book->getId(),
        ]);
    }

    public function read(): array
    {
        $sqlQuery = "SELECT * FROM books;";
        $statement = $this->connection->query($sqlQuery);

        return $this->hydrateBookList($statement);
    }

    public function find(?int $id): array
    {
        $sqlQuery = "SELECT * FROM books WHERE id = ?;";
        $statement = $this->connection->prepare($sqlQuery);
        $statement->bindValue(1, $id);
        $statement->execute();

        return $this->hydrateBookList($statement);
    }

    public function hydrateBookList(\PDOStatement $statement): array
    {
        $bookDataList = $statement->fetchAll();
        $bookList = [];

        foreach ($bookDataList as $bookData) {
            $bookList[] = new Book(
                $bookData['id'],
                $bookData['title'],
                $bookData['author'],
                new \DateTimeImmutable($bookData['date']),
                $bookData['company'],
                $bookData['image'],
                $bookData['synopsis']
            );
        }

        return $bookList;
    }

    public function delete(?int $book): bool
    {
        $statement = $this->connection->prepare("DELETE FROM books WHERE id = ?;");
        $statement->bindValue(1, $book, PDO::PARAM_INT);

        return $statement->execute();
    }
}