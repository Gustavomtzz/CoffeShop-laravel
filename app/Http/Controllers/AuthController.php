<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistroRequest;

class AuthController extends Controller
{
    public function register(RegistroRequest $request)
    {

        // //Validar mediante las REGLAS del FORM REQUEST
        // $datos = $request->validated();

        // //CREAR el usuario en la BD
        // $user =  User::Create([
        //     'name' => $datos['name'],
        //     'email' => $datos['email'],
        //     'password' => bcrypt($datos['password']),
        // ]);
        // //CREAR un token para la autorizacion mediante Sanctum
        // $token = $user->createToken('token')->plainTextToken;

        // //Enviar una Respuesta
        // return response([
        //     'user' => $user,
        //     'token' => $token,
        // ]);
    }
    public function login(LoginRequest $request)
    {

        $datos = $request->validated();

        //Verificar las credenciales
        if (!Auth::attempt($datos)) {
            return response([
                "errors" => ['El password es incorrecto']
            ], 401);
        }

        //Autenticar el usuario
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        //Enviar una Respuesta
        return response(compact('user', 'token'));
    }
    public function logout(Request $request)
    {
        $bool = $request->user()->currentAccessToken()->delete();

        if (!$bool) {
            return response(["No se pudo cerrar sesión"], 401);
        }

        return response(compact("bool"));
    }
}
