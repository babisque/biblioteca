<?php

namespace App\Library\Entity;

class Book
{
    private ?int $id;
    private string $title;
    private string $author;
    private \DateTimeImmutable $date;
    private string $company;
    private string $image;
    private string $synopsis;

    public function __construct(?int $id, $title, $author, $date, $company, $image, $synopsis)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->date = $date;
        $this->company = $company;
        $this->image = $image;
        $this->synopsis = $synopsis;
    }

    public function setId(?int $id): void
    {
        if(!is_null($this->id)) {
            throw new \DomainException('Você só pode definir o ID uma vez.');
        }
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $newTitle): void
    {
        $this->title = $newTitle;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $newAuthor): void
    {
        $this->author = $newAuthor;
    }

    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $newDate): void
    {
        $this->date = $newDate;
    }

    public function getCompany(): string
    {
        return $this->company;
    }

    public function setCompany(string $newCompany): void
    {
        $this->company = $newCompany;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $newSynopsis): void
    {
        $this->synopsis = $newSynopsis;
    }
}