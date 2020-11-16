<?php

namespace App\Core\Http\Routes;

use Support\Http\Routing\RoutesFile;

class Web extends RoutesFile
{
    public function routes()
    {
        $this->router->any('/', function () {
           // return \File::get( public_path() . "index.html" );
        });
    }
}