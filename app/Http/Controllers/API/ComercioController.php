<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comercio;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Resources\ComercioResource;
use App\Http\Requests\ComercioRequest;
use App\Http\Middleware\RoleMiddleware;

class ComercioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['update', 'destroy']);
        $this->middleware(RoleMiddleware::class . ':admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ComercioResource::collection(Comercio::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComercioRequest $request)
    {
        $new_company = new Comercio();
        $new_company->name = $request->input('name');
        $new_company->address = $request->input('address');
        $new_company->description = $request->input('description');
        $new_company->phone = $request->input('phone');
        $new_company->starting_hour = $request->workingHours['opening'];
        $new_company->closing_hour = $request->workingHours['closing'];
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
        return new ComercioResource($company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comercio $company)
    {
        $company->update($request->all());

        return response()->json($company);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comercio $company)
    {
        $company->reportes()->delete();
        $company->delete();
        return response()->json($company);
    }
}
