<?php

use Companies\Application\CompanyDto;
use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/', function (Request $request, Response $response, array $args) use ($app) {
    try {
        $companyApplicationService = $app->getContainer()->get('company_application_service');
        if (empty($companyApplicationService)) {
            throw new Exception("IoC returned null for companyApplicationService");
        }
        $appInstanceDto = $companyApplicationService->getAppInstanceInfo();
        return $response->withJson($appInstanceDto, 200, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        $errorDto = getErrorDto($e);
        return $response->withJson($errorDto, 200, JSON_UNESCAPED_UNICODE);
    }
});

$app->get('/api/company', function (Request $request, Response $response, array $args) use ($app) {
    try {
        $companyApplicationService = $app->getContainer()->get('company_application_service');
        if (empty($companyApplicationService)) {
            throw new Exception("IoC returned null for companyApplicationService");
        }
        $company = $companyApplicationService->getData("20147726342");
        $companyResponseDto = new CompanyDto();
        $companyResponseDto->setName($company->getName());
        $companyResponseDto->setAddress($company->getAddress());
        $companyResponseDto->setPhone($company->getPhone());
        return $response->withJson($companyResponseDto, 200, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        $errorDto = getErrorDto($e);
        return $response->withJson($errorDto, 200, JSON_UNESCAPED_UNICODE);
    }
});

$app->get('/api/get/{code}', function (Request $request, Response $response, array $args) use ($app) {
    try {
        $companyApplicationService = $app->getContainer()->get('company_application_service');
        if (empty($companyApplicationService)) {
            throw new Exception("IoC returned null for companyApplicationService");
        }        
        $company = $companyApplicationService->getData($args['code']);
        $companyResponseDto = new CompanyDto();
        $companyResponseDto->setName($company->getName());
        $companyResponseDto->setAddress($company->getAddress());
        $companyResponseDto->setPhone($company->getPhone());
        return $response->withJson($companyResponseDto, 200, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        $errorDto = getErrorDto($e);
        return $response->withJson($errorDto, 200, JSON_UNESCAPED_UNICODE);
    }
});

function getErrorDto(Exception $e) {
    $errorDto = new stdClass();
    $errorDto->error_message = $e->getMessage();
    return $errorDto;
}
