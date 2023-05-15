<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Director::latest()->get();
        return view('admin.directors', ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $director = Director::where('id', Auth::guard("director")->id())->first();
        return view('director.profile', ["data" => $director]);
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
        $director = new Director;
        $director->names = $request->names;
        $director->email = $request->email;
        $director->address = $request->address;
        $director->password = bcrypt($request->password);
        $director->save();
        return redirect('/admin/directors');
    }

    /**
     * Display the specified resource.
     */
    public function show(Director $director)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Director $director)
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
            $director = Director::where("id", Auth::guard("director")->id())->first();
            $director->address = $request->address;
            $director->password = bcrypt($request->firstPassword);
            $director->update();
            return redirect("/director");
        } else {
            return redirect("/director")->withErrors("Password not match");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Director $director)
    {
        $director->delete();
        return redirect('/admin/directors');
    }
}
