<?php
namespace App\Api\User\Http\Controllers;

use App\Api\User\Http\Requests\UserRequest;
use Domains\User\DataTransferObject\UserData;
use Domains\User\Repositories\UserRepository;
use Support\Http\Controllers\Controller;
use Illuminate\Http\Request;


/**
 * @property instace repository UserRepository
 */
class UserController extends Controller
{
    /**
     * @param  UserRepository $userRepository
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('jwt.auth');
        // $this->middleware('jwt.auth', ['except' => ['store', 'index']]);
        $this->repository = $userRepository;
    }

    /**
     * Lista todos os usuário
     *
     * @return Response
     */
    public function index()
    {
        return $this->repository->all();
    }


    /**
     * Registra novo usuário
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $userDto = UserData::fromRequest($request)->toArray();
        $user = $this->repository->create($userDto);

        if (!$user) return $this->response500();
        return $this->response201($user);
    }


    /**
     * Lista um usuário
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $user = $this->repository->find($id);

        if (!$user) return $this->responseResourceEmpty();
        return $this->response200($user);
    }

    /**
     *  Atualiza um usuário
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        $userDto = UserData::fromRequest($request)->toArray();
        unset($userDto['password']);

        $user = $this->repository->update($userDto, $id);

        if (!$user) return $this->response500();
        return $this->response200($user);
    }

    /**
     * Remove um usuário
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $user = $this->repository->delete($id);

        if (!$user) return $this->response500();
        return $this->response200($user);
    }
}