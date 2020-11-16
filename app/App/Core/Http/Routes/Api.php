<?php

namespace App\Core\Http\Routes;


use Support\Http\Routing\RoutesFile;

class Api extends RoutesFile
{
    public function routes()
    {
        $this->router->get('/', function (){
            return response()->json([
                'api' => '1.0.0'
            ]);
        });
    }
}