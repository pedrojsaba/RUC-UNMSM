<?php
namespace Books\Application;

use Books\Application\BookAssembler;
use Books\Application\AppInstanceDto;

class BookApplicationService
{
    private $bookRepository;

    public function __construct($bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getBestSellers()
    {
        $booksDto = array();
        $books = $this->bookRepository->getBestSellers();
        foreach ($books as $book) {
            $bookAssembler = new BookAssembler();
            $bookDto = $bookAssembler->toDto($book);
            array_push($booksDto, $bookDto);
        }
        return $booksDto;
    }

    public function getAppInstanceInfo()
    {
        $instanceIndex = isset($_ENV['CF_INSTANCE_INDEX']) ? $_ENV['CF_INSTANCE_INDEX'] : "";
        $instanceIP = isset($_ENV['CF_INSTANCE_IP']) ? $_ENV['CF_INSTANCE_IP'] : "";
        $appInstanceDto = new AppInstanceDto();
        $appInstanceDto->setIndex($instanceIndex);
        $appInstanceDto->setIp($instanceIP);
        return $appInstanceDto;
    }
}