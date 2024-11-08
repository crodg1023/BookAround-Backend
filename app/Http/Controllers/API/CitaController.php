<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\Comercio;
use Illuminate\Http\Request;
use App\Http\Requests\CitaRequest;
use App\Http\Resources\CitaResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentReservedMail;

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
    public function store(Request $request)
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

        Mail::to($request->reservation_email)->send(new AppointmentReservedMail([
            'comercio' => $comercio->name,
            'fecha' => $parsed_date->format('d/m/Y'),
            'hora' => $parsed_date->format('h:i A')
        ]));

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

    public function getCustomerAppointments($id)
    {
        $appointments = Cita::where('cliente_id', $id)->get();

        if (count($appointments) === 0) {
            return response()->json([
                'message' => 'Appointments not found'
            ], 404);
        }

        return response()->json(CitaResource::collection($appointments));
    }

    public function getBusinessAppointments($id)
    {
        $appointments = Cita::where('comercio_id', $id)->get();

        if (count($appointments) === 0) {
            return response()->json([
                'message' => 'Appointments not found'
            ], 404);
        }

        return response()->json(CitaResource::collection($appointments));
    }
}
