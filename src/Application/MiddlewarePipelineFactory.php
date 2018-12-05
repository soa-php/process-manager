<?php

declare(strict_types=1);

namespace Soa\ProcessManager\Application;

class MiddlewarePipelineFactory
{
    public static function create(...$middlewares): callable
    {
        $nextMiddleware = function ($input) {};

        $middlewares = array_reverse($middlewares);
        foreach ($middlewares as $middleware) {
            $nextMiddleware = function ($input) use ($middleware, $nextMiddleware) {
                return $middleware($input, $nextMiddleware);
            };
        }

        return $nextMiddleware;
    }
}
