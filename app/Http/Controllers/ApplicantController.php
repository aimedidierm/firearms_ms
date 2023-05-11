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
}
