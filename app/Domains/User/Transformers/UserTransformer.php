<?php

namespace Domains\User\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class UserTransformer extends JsonResource
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
            'id'          => $this->id,
            'name'        => $this->nome,
            'email'       => $this->email,
            'createdAt'   => (string) $this->created_at,
            'updatedAt'   => (string) $this->updated_at
        ];
    }
}
