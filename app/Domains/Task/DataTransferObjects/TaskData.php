<?php
namespace Domains\Task\DataTransferObject;

use App\Api\Task\Http\Requests\TaskRequest;
use Spatie\DataTransferObject\DataTransferObject;

class TaskData extends DataTransferObject
{
    public string $nome;

    public string $descricao;

    public int $usuario_id;

    public static function fromRequest(TaskRequest $request): self
    {
        return new self([
            'nome'        => $request->get('title'),
            'descricao'   => $request->get('description'),
            'usuario_id'  => $request->get('userId'),
        ]);
    }
}