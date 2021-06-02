<?php

declare(strict_types=1);

namespace PJ\Home;

use PJ\Middleware\HandlerFactory;
use Psr\Http\Server\RequestHandlerInterface;

class HomeRequestHandlerFactory implements HandlerFactory
{
    public function createRequestHandler(): RequestHandlerInterface
    {
        return new HomeRequestHandler();
    }
}