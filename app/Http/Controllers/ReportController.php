<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function approved()
    {
        $data = Applicant::latest()->where("rejected", false)->where("status", "approved")->get();
        $data->load('application');
        $pdf = Pdf::loadView('director.reportApproved', ['data' => $data]);
        return $pdf->download('report.pdf');
    }

    public function rejected()
    {
        $data = Applicant::latest()->where("rejected", true)->get();
        $data->load('application');
        $pdf = Pdf::loadView('director.reportRejected', ['data' => $data]);
        return $pdf->download('report.pdf');
    }
}
