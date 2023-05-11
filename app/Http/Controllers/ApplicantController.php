<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
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
        $applicant = Applicant::where('id', Auth::guard("applicant")->id())->first();
        return view('applicant.profile', ["data" => $applicant]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'names' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'password' => 'required'
        ]);
        $applicant = new Applicant;
        $applicant->names = $request->names;
        $applicant->email = $request->email;
        $applicant->address = $request->address;
        $applicant->phone = $request->phone;
        $applicant->password = bcrypt($request->password);
        $applicant->save();
        return redirect(route("login"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applicant $applicant)
    {
        //
    }

    public function psychiatricList()
    {
        $data = Applicant::latest()->where("status", "rApproved")->where("rejected", false)->get();
        return view('psychiatric.applicant', ["data" => $data]);
    }

    public function reject($id)
    {
        $applicant = Applicant::where("id", $id)->where("rejected", false)->first();
        $applicant->rejected = true;
        $applicant->update();
        return redirect("/psychiatric/applicants");
    }

    public function approve($id)
    {
        $applicant = Applicant::where("id", $id)->where("rejected", false)->first();
        $applicant->status = "pApproved";
        $applicant->update();
        return redirect("/psychiatric/applicants");
    }

    public function registerList()
    {
        $data = Applicant::latest()->where("status", "send")->where("rejected", false)->get();
        return view('register.applicant', ["data" => $data]);
    }

    public function registerReject($id)
    {
        $applicant = Applicant::where("id", $id)->where("rejected", false)->first();
        $applicant->rejected = true;
        $applicant->update();
        return redirect("/register/applicants");
    }

    public function registerApprove($id)
    {
        $applicant = Applicant::where("id", $id)->where("rejected", false)->first();
        $applicant->status = "rApproved";
        $applicant->update();
        return redirect("/register/applicants");
    }

    public function psychiatricApproved()
    {
        $data = Applicant::latest()->where("status", "pApproved")->where("rejected", false)->get();
        return view('register.trained', ["data" => $data]);
    }

    public function trainingReject($id)
    {
        $applicant = Applicant::where("id", $id)->where("rejected", false)->first();
        $applicant->rejected = true;
        $applicant->update();
        return redirect("/register/trained");
    }

    public function trainingApprove($id)
    {
        $applicant = Applicant::where("id", $id)->where("rejected", false)->first();
        $applicant->status = "pApproved";
        $applicant->update();
        return redirect("/register/trained");
    }

    public function approved()
    {
        $data = Applicant::latest()->where("rejected", false)->where("status", "approved")->get();
        return view("register.approved", ["data" => $data]);
    }

    public function rejected()
    {
        $data = Applicant::latest()->where("rejected", true)->get();
        return view("register.rejected", ["data" => $data]);
    }

    public function directorList()
    {
        $data = Applicant::latest()->where("rejected", false)->where("status", "send")->get();
        return view("director.applicants", ["data" => $data]);
    }

    public function directorRegisterList()
    {
        $data = Applicant::latest()->where("rejected", false)->where("status", "rApproved")->get();
        return view("director.psychiatric", ["data" => $data]);
    }

    public function directorPsychiatricList()
    {
        $data = Applicant::latest()->where("rejected", false)->where("status", "PApproved")->get();
        return view("director.psychiatric", ["data" => $data]);
    }

    public function directorApprovedList()
    {
        $data = Applicant::latest()->where("rejected", false)->where("status", "approved")->get();
        return view("director.approved", ["data" => $data]);
    }

    public function directorRejectedList()
    {
        $data = Applicant::latest()->where("rejected", true)->get();
        return view("director.rejected", ["data" => $data]);
    }

    public function status()
    {
        $data = Applicant::where("id", Auth::guard("applicant")->id())->first();
        return view("applicant.status", ["data" => $data]);
    }
}
