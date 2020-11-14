<?php
namespace Domains\User\DataTransferObject;

use App\Api\User\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class UserData extends DataTransferObject
{
    public string $nome;

    public string $email;

    public string $password;

    public static function fromRequest(Request $request): self
    {
        return new self([
            'nome'      => $request->get('name'),
            'email'     => $request->get('email'),
            'password'  => bcrypt($request->get('password')),
        ]);
    }
}