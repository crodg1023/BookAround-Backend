<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function login(Request $request) {
        $user = Usuario::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([ 'message' => 'Credenciales incorrectas' ], 401);
        } else {
            return response()->json([
                'token' => $user->createToken($user->email)->plainTextToken,
                'role' => $user->role->type,
                'client_id' => $user->cliente_id,
                'business_id' => $user->comercio_id,
                'email' => $user->email
            ]);
        }
    }
}
