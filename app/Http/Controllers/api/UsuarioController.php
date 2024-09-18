<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccessUserRequest;
use App\Http\Requests\CreatedUsuarioRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\PersonalAccessToken;

class UsuarioController extends Controller
{
    public function userRegister(CreatedUsuarioRequest $request)
    {

        $encryptPassword = $request->encryptPassword();
        // Crea el usuario con los datos validados
        $usuario = User::create($encryptPassword);

        return response()->json([
            "success" => true,
            "data" => $usuario,
            "message" => "usuario registrado y logueado",
        ]);
    }
    //logear user
    public function accessUser(AccessUserRequest $request)
    {
        $user = User::where("usuario", $request->usuario)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                "message" => ["Las credenciales son incorrectas!!!"]
            ]);
        }
        // Revocar todos los tokens previos del usuario
        $user->tokens()->delete();

        // Crear un nuevo token

        $token = $user->createToken($request->usuario)->plainTextToken;
    // Unificar el usuario y el token en un solo array
    $response = [
        "user" => $user,
        "token" => $token
    ];
        return response()->json([
            "success" => true,
            "data" => $response,
            "message" => "Cliente logueado"
        ]);
    }
}
