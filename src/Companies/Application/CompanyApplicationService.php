<?php

namespace Companies\Application;

use Companies\Application\CompanyAssembler;
use Companies\Application\AppInstanceDto;

class CompanyApplicationService {

    private $companyRepository;

    public function __construct($companyRepository) {
        $this->companyRepository = $companyRepository;
    }

    public function getData($code) {        
        $company = $this->companyRepository->getData($code);
        $companyRepository = new CompanyAssembler();
        $companyDto = $companyRepository->toDto($company);
        return $companyDto;
    }

    public function getAppInstanceInfo() {
        $instanceIndex = isset($_ENV['CF_INSTANCE_INDEX']) ? $_ENV['CF_INSTANCE_INDEX'] : "";
        $instanceIP = isset($_ENV['CF_INSTANCE_IP']) ? $_ENV['CF_INSTANCE_IP'] : "";
        $appInstanceDto = new AppInstanceDto();
        $appInstanceDto->setIndex($instanceIndex);
        $appInstanceDto->setIp($instanceIP);
        return $appInstanceDto;
    }

}
