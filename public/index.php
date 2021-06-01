<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use Symfony\Component\ErrorHandler\ErrorHandler;
use Symfony\Component\ErrorHandler\Debug;
use PJ\Routing\RoutingMiddleware;
use PJ\Middleware\MiddlewareHandler;
use PJ\Middleware\HandlersFactoryRequestHandler;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

//getenv('debug') ? Debug::enable() : ErrorHandler::register();
Debug::enable();

$configPath = getenv('configPath') ?: __DIR__ . '/../config/routes.php';
$routingMiddleware = RoutingMiddleware::create(require $configPath);
$response = $routingMiddleware->process(
    ServerRequestFactory::fromGlobals(),
    new HandlersFactoryRequestHandler(),
);
(new SapiEmitter())->emit($response);