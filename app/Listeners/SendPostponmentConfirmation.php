<?php

namespace App\Listeners;

use App\Events\CitaAplazada;
use App\Mail\AppointmentPostponedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPostponmentConfirmation
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
    public function handle(CitaAplazada $event): void
    {
        Mail::to($event->cita->reservation_email)->send(new AppointmentPostponedMail());
    }
}
