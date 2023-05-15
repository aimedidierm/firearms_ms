<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
        $admin = Admin::where('id', Auth::id())->first();
        return view('admin.profile', ["data" => $admin]);
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
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
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
            $admin = Admin::where("id", Auth::id())->first();
            $admin->address = $request->address;
            $admin->password = bcrypt($request->firstPassword);
            $admin->update();
            return redirect("/admin");
        } else {
            return redirect("/admin")->withErrors("Password not match");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
