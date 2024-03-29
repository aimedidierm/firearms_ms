<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Register::latest()->get();
        return view('admin.registers', ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $register = Register::where('id', Auth::guard("register")->id())->first();
        return view('register.profile', ["data" => $register]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "names" => "required|string",
            'email' => ['required', 'email', new \App\Rules\UniqueEmailAcrossTables],
            "address" => "required|string",
            "password" => "required|string"
        ]);
        $register = new Register;
        $register->names = $request->names;
        $register->email = $request->email;
        $register->address = $request->address;
        $register->password = bcrypt($request->password);
        $register->save();
        return redirect('/admin/registers');
    }

    /**
     * Display the specified resource.
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Register $register)
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
            $register = Register::where("id", Auth::guard("register")->id())->first();
            $register->address = $request->address;
            $register->password = bcrypt($request->firstPassword);
            $register->update();
            return redirect("/register");
        } else {
            return redirect("/register")->withErrors("Password not match");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Register $register)
    {
        $register->delete();
        return redirect('/admin/registers');
    }
}
