<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use Illuminate\Http\Request;
use App\Http\Requests\CitaRequest;
use App\Http\Resources\CitaResource;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CitaResource::collection(Cita::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CitaRequest $request)
    {
        $new_appointment = new Cita();
        $new_appointment->comercio()->associate($request->comercio_id);
        $new_appointment->cliente()->associate($request->cliente_id);
        $new_appointment->date_time = $request->date_time;
        $new_appointment->save();

        return response()->json($new_appointment);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $appointment)
    {
        return new CitaResource($appointment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CitaRequest $request, Cita $appointment)
    {
        $appointment->date_time = $request->date_time ?: $appointment->date_time;
        $appointment->save();

        return response()->json($appointment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $appointment)
    {
        $appointment->delete();
        return response()->json($appointment);
    }
}
