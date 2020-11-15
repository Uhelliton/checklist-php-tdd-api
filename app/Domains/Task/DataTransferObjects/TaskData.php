<?php
namespace Domains\Task\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class TaskData extends DataTransferObject
{
    public string $nome;

    public string $descricao;

    public int $usuario_id;

    public static function fromRequest(Request $request): self
    {
        return new self([
            'nome'        => $request->get('title'),
            'descricao'   => $request->get('description'),
            'usuario_id'  => $request->get('userId'),
        ]);
    }
}