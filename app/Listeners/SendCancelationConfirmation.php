<?php

namespace App\Listeners;

use App\Events\CitaCancelada;
use App\Mail\AppointmentCanceledMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendCancelationConfirmation
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
    public function handle(CitaCancelada $event): void
    {
        Mail::to($event->cita->reservation_email)->send(new AppointmentCanceledMail());
    }
}
