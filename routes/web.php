<?php

use Illuminate\Support\Facades\Route;
use App\Services\PdfService;


Route::get('/', function () {
    return view('welcome');
});

Route::get('pdf', function () {
    return view('pdf.confirmation');
});

Route::get('pdf-preview', function (PdfService $pdf) {
    $path = $pdf->generatePdfPreview();

    return response()->file($path);
});

Route::get('mail', function () {
    return view('mails.appointment-reserved');
});
