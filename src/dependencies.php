<?php
// DIC configuration

use Companies\Infrastructure\CompanyFakeRepository;
use Companies\Application\CompanyApplicationService;

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];    
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['company_fake_repository'] = function ($container) {
    return new CompanyFakeRepository();
};

$container['company_application_service'] = function ($container) {
    return new CompanyApplicationService(
        $container['company_fake_repository']
    );
};