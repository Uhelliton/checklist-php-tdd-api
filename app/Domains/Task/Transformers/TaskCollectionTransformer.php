<?php

namespace Domains\Task\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TaskCollectionTransformer extends ResourceCollection
{
    /**
     * Cria uma nova instância de recurso.
     *
     * AdvertTransformer constructor.
     * @param $resource
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
    }


    /**
     * Transforme a coleção de recursos em uma matriz.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
            $this->resource->map(function($object){
                return [
                    'id'            => $object->id,
                    'title'         => $object->nome,
                    'description'   => $object->descricao,
                    'createdAt'   => (string) $object->created_at,
                    'updatedAt'   => (string) $object->updated_at
                ];
            });
    }


    /**
     * Obtenha dados adicionais que devem ser retornados com a matriz de recursos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            'success'  => true,
        ];
    }
}
