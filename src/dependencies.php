<?php
// DIC configuration

use Books\Infrastructure\BookFakeRepository;
use Books\Application\BookApplicationService;

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

$container['book_fake_repository'] = function ($container) {
    return new BookFakeRepository();
};

$container['book_application_service'] = function ($container) {
    return new BookApplicationService(
        $container['book_fake_repository']
    );
};