<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use App\Http\Resources\UsuarioResource;
use App\Http\Middleware\RoleMiddleware;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware(RoleMiddleware::class . ':admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UsuarioResource::collection(Usuario::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $request)
    {
        $new_user = new Usuario();
        $new_user->email = $request->email;
        $new_user->password = $request->password;
        $new_user->role()->associate($request->role_id);
        $new_user->save();

        return response()->json($new_user);
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $user)
    {
        return new UsuarioResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $user)
    {
        $user->update($request->all());

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $user)
    {
        $user->delete();
        return response()->json($user);
    }
}
