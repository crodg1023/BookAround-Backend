<?php

namespace App\Listeners;

use App\Events\CitaCreada;
use App\Mail\AppointmentReservedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAppointmentConfirmationEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CitaCreada $event): void
    {
        Mail::to($event->cita->reservation_email)->send(new AppointmentReservedMail($event->cita));
    }
}
