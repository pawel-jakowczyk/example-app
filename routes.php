<?php

use PJ\ExampleApp\Home\HomeRequestHandlerFactory;
use PJ\Middleware\EmptyMiddlewareFactory;
use PJ\Middleware\MiddlewareRoute;
use PJ\Middleware\MiddlewareRouteCollection;

return new MiddlewareRouteCollection(
    new MiddlewareRoute('home', new HomeRequestHandlerFactory(), new EmptyMiddlewareFactory(), '/'),
);