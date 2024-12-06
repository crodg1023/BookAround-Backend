<?php

namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Cita;
use Carbon\Carbon;

class PdfService
{
    public function generateConfirmationPdf(Cita $cita)
    {
        \Log::info($cita);
        $data = [
            'name' => $cita->comercio->name,
            'address' => $cita->comercio->address,
            'people' => $cita->people,
            'date' => Carbon::parse($cita->date_time)->format('d/m/Y'),
            'time' => Carbon::parse($cita->date_time)->format('H:i')
        ];

        $pdf = Pdf::loadView('pdf.confirmation', $data);
        $path = storage_path('app/public/confirmation.pdf');
        $pdf->save($path);

        return $path;
    }
}
