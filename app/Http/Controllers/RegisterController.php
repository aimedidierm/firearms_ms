<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;

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
        //
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
    public function update(Request $request, Register $register)
    {
        //
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
