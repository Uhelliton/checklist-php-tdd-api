<?php

namespace App\Core\Http\Routes;


use Support\Http\Routing\RoutesFile;

class Api extends RoutesFile
{
    public function routes()
    {
        $this->router->get('/', function (){
            return 'ops';
        });
    }
}