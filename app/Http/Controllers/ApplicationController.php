<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userDetails = Applicant::where('id', Auth::guard("applicant")->id())->first();
        if ($userDetails->status != "none") {
            return view('applicant.applied');
        } else {
            return view('applicant.application', ["data" => $userDetails]);
        }
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
        $request->validate([
            "phone" => "required",
            "birth" => "required|date",
            "sex" => "required",
            "status" => "required",
            "province" => "required",
            "district" => "required",
            "sector" => "required",
            "cell" => "required",
            "village" => "required",
            "personalStatus" => "required",
            "rank" => "required",
            "NID" => "required",
            "type" => "required",
            "comment" => "required",
        ]);
        $application = new Application;
        $application->applicant_id = Auth::guard("applicant")->id();
        $application->phone = $request->phone;
        $application->birth = $request->birth;
        $application->sex = $request->sex;
        $application->materialStatus = $request->status;
        $application->country = "Rwanda";
        $application->province = $request->province;
        $application->district = $request->district;
        $application->sector = $request->sector;
        $application->cell = $request->cell;
        $application->village = $request->village;
        $application->personStatus = $request->personalStatus;
        $application->rank = $request->rank;
        $application->NID = $request->NID;
        $application->FirearmsType = $request->type;
        $application->comment = $request->comment;
        $application->save();

        $applicant = Applicant::where("id", Auth::guard("applicant")->id())->first();
        $applicant->status = "send";
        $applicant->update();
        return redirect("/applicant/application");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $application = Application::latest()->where("applicant_id", $id)->first();
        if ($application != null) {
            $application->load("applicants");
            return view("details", ["data" => $application]);
        } else {
            return view("details", ["data" => null]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
