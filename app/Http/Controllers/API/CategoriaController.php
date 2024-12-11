<?php

namespace App\Http\Controllers\API;

use App\Models\Categoria;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriaResource;
use Illuminate\Http\Request;
use App\Http\Middleware\RoleMiddleware;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
        $this->middleware(RoleMiddleware::class . ':admin')->only(['store', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoriaResource::collection(Categoria::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $category)
    {
        return new CategoriaResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
