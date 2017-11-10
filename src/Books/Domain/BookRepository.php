<?php
namespace Books\Domain;

interface BookRepository
{
    public function getBestSellers();
}