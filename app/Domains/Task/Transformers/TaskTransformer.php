<?php

namespace Domains\Task\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskTransformer extends JsonResource
{
    /**
     * Transforme a coleção de recursos em uma matriz.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'title'         => $this->nome,
            'description'   => $this->descricao,
            'createdAt'   => (string) $this->created_at,
            'updatedAt'   => (string) $this->updated_at
        ];
    }
}
