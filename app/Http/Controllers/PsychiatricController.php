<?php

namespace App\Http\Controllers;

use App\Models\Psychiatric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsychiatricController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Psychiatric::latest()->get();
        return view('admin.psychiatrics', ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $psychiatric = Psychiatric::where('id', Auth::guard("psychiatric")->id())->first();
        return view('psychiatric.profile', ["data" => $psychiatric]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "names" => "required|string",
            "email" => "required|email",
            "address" => "required|string",
            "password" => "required|string"
        ]);
        $psychiatric = new Psychiatric;
        $psychiatric->names = $request->names;
        $psychiatric->email = $request->email;
        $psychiatric->address = $request->address;
        $psychiatric->password = bcrypt($request->password);
        $psychiatric->save();
        return redirect('/admin/psychiatrics');
    }

    /**
     * Display the specified resource.
     */
    public function show(Psychiatric $psychiatric)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Psychiatric $psychiatric)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            "address" => "required|string",
            "firstPassword" => "required|string",
            "confirmPassword" => "required|string"
        ]);
        if ($request->firstPassword == $request->confirmPassword) {
            $psychiatric = Psychiatric::where("id", Auth::guard("psychiatric")->id())->first();
            $psychiatric->address = $request->address;
            $psychiatric->password = bcrypt($request->firstPassword);
            $psychiatric->update();
            return redirect("/psychiatric");
        } else {
            return redirect("/psychiatric")->withErrors("Password not match");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Psychiatric $psychiatric)
    {
        $psychiatric->delete();
        return redirect('/admin/psychiatrics');
    }
}
