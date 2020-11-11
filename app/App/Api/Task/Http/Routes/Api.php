<?php

namespace App\Api\Task\Http\Routes;

use Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;

class Api extends RoutesFile
{
    public function routes()
    {
        $this->router->apiResource('/tasks', 'TaskController');
    }
}