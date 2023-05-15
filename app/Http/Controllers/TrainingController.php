<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
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
    public function create()
    {
        //
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
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Training $training)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        //
    }

    public function applicantList()
    {
        // $trainings = Training::latest()->get();
        $trainings = null;
        $data = Applicant::where('id', Auth::id())->first();
        if ($data->status == "pApproved") {
            return view('applicant.training', ["data" => $trainings]);
        } else {
            // return view('applicant.notraining');
            return view('applicant.training');
        }
    }

    public function playList(Training $training)
    {
        // $trainings = Training::latest()->get();
        $trainings = null;
        $data = Applicant::where('id', Auth::id())->first();
        if ($data->status == "pApproved") {
            return view('applicant.playlist', ["data" => $trainings, "training" => $training]);
        } else {
            return view('applicant.notraining');
        }
    }
}
