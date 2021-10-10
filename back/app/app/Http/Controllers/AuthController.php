<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use JWTAuth;

class AuthController extends Controller
{
   
    public function __construct(){
        //Hacemos que el token caduque a las 8h
        JWTAuth::factory()->setTTL(480);
    }

    //Requiere los parametros de login y los comprueba. Crea una sesion a traves de guard de auth de laravel.
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => true,  'message' => 'Incorrect email or password.'], 200);
        }

        return $this->respondWithToken($token);
    }

    //Devuelve el usuario loggeado.
    public function me()
    {
        return response()->json(auth()->user());
    }

    //Deslogua el usuario.
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    //Refresca el JWT
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    //Devuelve el token de tipo bearer.
    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'type' => 'bearer',
            'expiresIn' => auth()->factory()->getTTL() * 60,
            'error' => false,
            'message' => 'Successfully logged. Redirecting...'
        ]);
    }
}