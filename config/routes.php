<?php

use Symfony\Component\Routing\RouteCollection;
use PJ\Middleware\MiddlewareRoute;
use PJ\Middleware\EmptyMiddlewareFactory;
use PJ\Home\HomeRequestHandlerFactory;

$routesCollection = new RouteCollection();
$routesCollection->add(
    'home', new MiddlewareRoute(new HomeRequestHandlerFactory(), new EmptyMiddlewareFactory(), '/')
);
return $routesCollection;