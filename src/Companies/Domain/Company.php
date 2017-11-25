<?php
namespace Companies\Domain;

class Company
{
    private $name;
    private $address;
    private $phone;

    public function __construct($name, $address, $phone)
    {
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAddress()
    {
        return $this->address;
    }
    
     public function getPhone()
    {
        return $this->phone;
    }
}