<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Requests\ClienteRequest;
use App\Http\Resources\ClienteResource;
use App\Http\Middleware\RoleMiddleware;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('store');
        $this->middleware(RoleMiddleware::class . ':admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ClienteResource::collection(Cliente::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request)
    {
        $new_customer = new Cliente();
        $new_customer->name = $request->name;
        $new_customer->usuario()->associate(Usuario::findOrFail($request->usuario_id));
        $new_customer->save();
        return response()->json($new_customer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $customer)
    {
        return new ClienteResource($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $customer)
    {
        $customer->name = $request->name ?: $customer->name;
        $customer->save();
        return response()->json($customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $customer)
    {
        foreach ($customer->reviews as $review) {
            $review->reportes()->delete();
            $review->delete();
        }
        $customer->reportes()->delete();
        $customer->delete();
        return response()->json($customer);
    }
}
