<?php
namespace Books\Application;

use \JsonSerializable;

class BookResponseDto implements JsonSerializable
{
    private $books;
    private $appInstance;

    public function jsonSerialize()
    {
        return [
            'books' => $this->books,
            'app_instance' => $this->appInstance
        ];
    }

    public function setBooks($books)
    {
        $this->books = $books;
    }

    public function setAppInstance($appInstance)
    {
        $this->appInstance = $appInstance;
    }
}