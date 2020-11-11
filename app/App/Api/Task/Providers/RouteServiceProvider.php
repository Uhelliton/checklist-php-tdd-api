<?php

namespace App\Api\Task\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Api\Task\Http\Routes\Api;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Este espaço de nome é aplicado às rotas do controlador.
     * Além disso, ele é definido como o espaço de nomes da raiz do gerador de URL.
     *
     * @var string
     */
    protected $namespace = 'App\Api\Task\Http\Controllers';

    /**
     * Defina as ligações do seu modelo de rota, filtros padrão, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Defina as rotas para unidade
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
    }

    /**
     * Defina as rotas "api" para unidade.
     * Estas rotas recebem estado de sessão, proteção CSRF, etc.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        (new Api([
            'prefix' => 'api',
            'middleware' => ['web'],
            'namespace'  => $this->namespace
        ]))->register();
    }

}
