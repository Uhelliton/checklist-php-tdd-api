<?php

namespace App\Api\User\Http\Routes;

use Support\Http\Routing\RoutesFile;

class Api extends RoutesFile
{
    public function routes()
    {
        $this->router->apiResource('/users', 'UserController');
    }
}