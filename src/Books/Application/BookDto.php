<?php
namespace Books\Application;

use \JsonSerializable;

class BookDto implements JsonSerializable
{
    private $name;
    private $publisher;

    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'publisher' => $this->publisher
        ];
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }
}