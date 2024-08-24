<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comercio;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\ComercioRequest;

class ComercioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return Comercio::get();
        $comercios = Comercio::with('categorias')->get();
        return response()->json($comercios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComercioRequest $request)
    {
        $new_company = new Comercio();
        $new_company->name = $request->name;
        $new_company->address = $request->address;
        $new_company->city = $request->city;
        $new_company->country = $request->country;
        $new_company->description = $request->description;
        $new_company->score = 0;
        $new_company->usuario()->associate(Usuario::findOrFail($request->usuario_id));
        $new_company->save();

        return response()->json($new_company);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comercio $company)
    {
        $company->load('categorias');
        return response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ComercioRequest $request, Comercio $company)
    {
        $company->name = $request->name ?: $company->name;
        $company->address = $request->address ?: $company->address;
        $company->city = $request->city ?: $company->city;
        $company->country = $request->country ?: $company->country;
        $company->description = $request->description ?: $company->description;
        $company->score = $request->score ?: $company->score;
        $company->save();

        return response()->json($company);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comercio $company)
    {
        $company->delete();
        return response()->json($company);
    }
}
