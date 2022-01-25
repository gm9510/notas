<?php

namespace notas\src\core\middlewares;

abstract class BaseMiddleware
{
    abstract public function execute(): void;
}
