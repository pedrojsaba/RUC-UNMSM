<?php
namespace Books\Infrastructure;

use Books\Domain\BookRepository;
use Books\Domain\Book;
use Books\Domain\Publisher;

class BookFakeRepository implements BookRepository
{
    public function __construct()
    {
    }

    public function getBestSellers()
    {
        $books = array();
        $books[] = new Book("Clean Architecture: A Craftsman's Guide to Software Structure and Design", new Publisher("Prentice Hall"));
        $books[] = new Book("Cloud Native Java: Designing Resilient Systems with Spring Boot, Spring Cloud, and Cloud Foundry", new Publisher("O'Reilly Media"));
        $books[] = new Book("Design Patterns: Elements of Reusable Object-Oriented Software", new Publisher("Addison-Wesley"));
        return $books;
    }
}