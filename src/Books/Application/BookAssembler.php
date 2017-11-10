<?php
namespace Books\Application;

use Books\Application\BookDto;

class BookAssembler
{
    public function toDto($book)
    {
        if (empty($book)) {
            return null;
        }
        $bookDto = new BookDto();
        $bookDto->setName($book->getName());
        if (empty($book->getPublisher())) {
            return $bookDto;
        }
        $bookDto->setPublisher($book->getPublisher()->getName());
        return $bookDto;
    }
}