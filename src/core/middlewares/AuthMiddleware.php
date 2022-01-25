<?php
namespace notas\src\core\middlewares;
use notas\src\core\Application;

use notas\src\core\exceptions\ForbiddenException;

class AuthMiddleware extends BaseMiddleware
{
    public array $actions = [];

    public function __construct(array $actions = []) 
    {
        $this->actions = $actions;
    }
    public function execute(): void
    {
        if (Application::isGuest()) {
            if(empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}
