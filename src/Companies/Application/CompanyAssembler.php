<?php
namespace Companies\Application;

use Companies\Application\CompanyDto;

class CompanyAssembler
{
    public function toDto($company)
    {
        if (empty($company)) {
            return null;
        }
        $companyDto = new CompanyDto();
        $companyDto->setName($company->getName());
        $companyDto->setAddress($company->getAddres());
        $companyDto->setPhone($company->getPhone());
        return $companyDto;
    }
}