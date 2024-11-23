<?php

namespace App\Http\Controllers\API;

use App\Models\Reporte;
use App\Models\Cliente;
use App\Models\Comercio;
use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ReporteResource;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Reporte::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reporte $report)
    {
        return $report;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reporte $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reporte $report)
    {
        //
    }

    public function getReviewsReports()
    {
        $review_reports = Reporte::where('reportable_type', Review::class)->get();
        return ReporteResource::collection($review_reports);
    }

    public function getBusinessReports()
    {
        $business_reports = Reporte::where('reportable_type', Comercio::class)->get();
        return ReporteResource::collection($business_reports);
    }

    public function getCustomersReports()
    {
        $customer_reports = Reporte::where('reportable_type', Cliente::class)->get();
        return ReporteResource::collection($customer_reports);
    }
}
