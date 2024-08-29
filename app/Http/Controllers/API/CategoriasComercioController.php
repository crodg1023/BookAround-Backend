<?php

namespace App\Http\Controllers\API;

use App\Models\CategoriasComercios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Log;

class CategoriasComercioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(CategoriasComercios::get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach($request->categories as $category) {
            $new_categorias_comercio = new CategoriasComercios();
            $new_categorias_comercio->categoria_id = Categoria::where('name', $category)->pluck('id')->first();
            $new_categorias_comercio->comercio_id = $request->comercio_id;
            $new_categorias_comercio->save();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoriasComercios $categoriasComercios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoriasComercios $categoriasComercios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoriasComercios $categoriasComercios)
    {
        //
    }
}
