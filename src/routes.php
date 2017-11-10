<?php
use Slim\Http\Request;
use Slim\Http\Response;
use Books\Application\BookResponseDto;

$app->get('/', function (Request $request, Response $response, array $args) use ($app) {
    try {
        $bookApplicationService = $app->getContainer()->get('book_application_service');
        if (empty($bookApplicationService)) {
            throw new Exception("IoC returned null for bookApplicationService");
        }
        $appInstanceDto = $bookApplicationService->getAppInstanceInfo();
        return $response->withJson($appInstanceDto, 200, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        $errorDto = getErrorDto($e);
        return $response->withJson($errorDto, 200, JSON_UNESCAPED_UNICODE);
    }
});

$app->get('/api/books', function (Request $request, Response $response, array $args) use ($app) {
    try {
        $bookApplicationService = $app->getContainer()->get('book_application_service');
        if (empty($bookApplicationService)) {
            throw new Exception("IoC returned null for bookApplicationService");
        }
        $books = $bookApplicationService->getBestSellers();
        $appInstanceDto = $bookApplicationService->getAppInstanceInfo();
        $bookResponseDto = new BookResponseDto();
        $bookResponseDto->setBooks($books);
        $bookResponseDto->setAppInstance($appInstanceDto);
        return $response->withJson($bookResponseDto, 200, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        $errorDto = getErrorDto($e);
        return $response->withJson($errorDto, 200, JSON_UNESCAPED_UNICODE);
    }
});

function getErrorDto(Exception $e)
{
    $errorDto = new \stdClass();
    $errorDto->error_message = $e->getMessage();
    return $errorDto;
}