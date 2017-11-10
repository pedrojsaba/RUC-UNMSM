<?php
namespace Books\Domain;

class Book
{
    private $name;
    private $publisher;

    public function __construct($name, $publisher)
    {
        $this->name = $name;
        $this->publisher = $publisher;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }
}