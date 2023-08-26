<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $certificate = Certificate::where('serialNumber', $id)->first();
        if ($certificate != null) {
            $certificate->load('applicant');
            $pdf = Pdf::loadView('getGertificate', ['data' => $certificate]);
            return $pdf->download('certificate.pdf');
        } else {
            return "Incorect certificate ID";
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $certificate = Certificate::where('serialNumber', $id)->first();
        if ($certificate != null) {
            $certificate->load('applicant');
            return view('certificate', ['data' => $certificate]);
        } else {
            return "Incorect certificate ID";
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        //
    }
}
