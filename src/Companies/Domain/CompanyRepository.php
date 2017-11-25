<?php
namespace Companies\Domain;

interface CompanyRepository
{
    public function getData($code);
}