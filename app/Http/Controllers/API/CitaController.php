<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\Comercio;
use Illuminate\Http\Request;
use App\Http\Requests\CitaRequest;
use App\Http\Resources\CitaResource;
use Carbon\Carbon;
use App\Http\Middleware\RoleMiddleware;


class CitaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('store');
        $this->middleware(RoleMiddleware::class . ':customer')->only(['delete', 'update', 'getCustomerAppointments']);
    }
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
        $parsed_date = Carbon::parse($request->dateTime);

        $new_appointment = new Cita();
        $new_appointment->comercio()->associate($request->comercio_id);
        $new_appointment->cliente()->associate($request->cliente_id);
        $new_appointment->date_time = $parsed_date->format('Y-m-d H:i:s');
        $new_appointment->people = $request->people;
        $new_appointment->status = $request->status;
        $new_appointment->reservation_email = $request->reservation_email;
        $new_appointment->save();

        $comercio = Comercio::findOrFail($request->comercio_id);

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
    public function update(Request $request, Cita $appointment)
    {
        $request->validate([
            'dateTime' => [
                'required',
                'date',
                'after:now'
            ],
            'people' => [
                'integer',
                'min:1',
                'max:10'
            ]
        ]);

        $parsed_date = Carbon::parse($request->input('dateTime'));
        $appointment->date_time = $parsed_date ?: $appointment->date_time;
        $appointment->people = $request->input('people') ?: $appointment->people;
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

    public function getCustomerAppointments($id)
    {
        $appointments = Cita::where('cliente_id', $id)->orderBy('date_time', 'asc')->get();

        return CitaResource::collection($appointments);
    }

    public function getBusinessAppointments($id)
    {
        $appointments = Cita::where('comercio_id', $id)->orderBy('date_time', 'asc')->get();

        return response()->json(CitaResource::collection($appointments));
    }
}
