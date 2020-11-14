<?php

namespace App\Api\Auth\Http\Controllers;
use Domains\User\Repositories\UserRepository;
use Illuminate\Http\Request;
use Support\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


/**
 * @property instace repository UserRepository
 */
class AuthController extends Controller
{

    /**
     * Injeta as dependencias da classe
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }


    /**
     * Responsavel para efetivar a autenticacao na api via jwt
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'error'   => 'Não podemos encontrar uma conta com essas credenciais.'
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['success' => false, 'error' => 'Falha ao fazer o login, por favor, tente novamente.'], 500);
        }

        return $this->response200([
            'user' => $this->getUserAuthenticate(),
            'tokenType' => 'bearer',
            'token'      => $token
        ]);
    }


    /**
     * @return mixed
     */
    public function getUserAuthenticate()
    {
        $userId = JWTAuth::user()->id;
        return $this->repository->find($userId);
    }

}