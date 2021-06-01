<?php

use Laminas\Diactoros\Response\TextResponse;
use PJ\Middleware\HandlersFactory;
use PJ\Middleware\MiddlewareCollection;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use PJ\Middleware\MiddlewareRequestHandler;

$routesCollection = new RouteCollection();
$routesCollection->add('home', new Route('/', ['handlers_factory' => new class () implements HandlersFactory {
    public function createRequestHandler(): RequestHandlerInterface {
        return new class () implements RequestHandlerInterface {
            public function handle(ServerRequestInterface $request): ResponseInterface  {
                return new TextResponse('test', 200);
            }
        };
    }

    public function createMiddlewares(): MiddlewareCollection {
        return new MiddlewareCollection();
    }
}]));
return $routesCollection;