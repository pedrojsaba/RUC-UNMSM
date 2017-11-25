<?php

namespace Companies\Application;

use \JsonSerializable;

class CompanyDto implements JsonSerializable {

    private $name;
    private $address;
    private $phone;

    public function jsonSerialize() {
        return [
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone
        ];
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

}
