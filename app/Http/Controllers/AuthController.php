<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Applicant;
use App\Models\Director;
use App\Models\Psychiatric;
use App\Models\Register;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $admin = Admin::where('email', $email)->first();
        $applicant = Applicant::where('email', $email)->first();
        $director = Director::where('email', $email)->first();
        $psychiatric = Psychiatric::where('email', $email)->first();
        $register = Register::where('email', $email)->first();
        if ($admin != null) {
            $passwordMatch = Hash::check($password, $admin->password);
            if ($passwordMatch) {
                Auth::login($admin);
                return redirect("/admin/directors");
            } else {
                return redirect("/")->withErrors(['msg' => 'Incorect password']);
            }
        } elseif ($applicant != null) {
            $passwordMatch = Hash::check($password, $applicant->password);
            if ($passwordMatch) {
                Auth::guard("applicant")->login($applicant);
                return redirect("/applicant");
            } else {
                return redirect("/")->withErrors(['msg' => 'Incorect password']);
            }
        } elseif ($director != null) {
            $passwordMatch = Hash::check($password, $director->password);
            if ($passwordMatch) {
                Auth::guard("director")->login($director);
                return redirect("/director/applicants");
            } else {
                return redirect("/")->withErrors(['msg' => 'Incorect password']);
            }
        } elseif ($psychiatric != null) {
            $passwordMatch = Hash::check($password, $psychiatric->password);
            if ($passwordMatch) {
                Auth::guard("psychiatric")->login($psychiatric);
                return redirect("/psychiatric/applicants");
            } else {
                return redirect("/")->withErrors(['msg' => 'Incorect password']);
            }
        } elseif ($register != null) {
            $passwordMatch = Hash::check($password, $register->password);
            if ($passwordMatch) {
                Auth::guard("register")->login($register);
                return redirect("/register/applicants");
            } else {
                return redirect("/")->withErrors(['msg' => 'Incorect password']);
            }
        } else {
            return redirect('/')->withErrors(['msg' => 'Incorect email and password']);
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect(route("login"));
        } else if (Auth::guard('applicant')->check()) {
            Auth::guard("applicant")->logout();
            return redirect(route("login"));
        } else if (Auth::guard('director')->check()) {
            Auth::guard("director")->logout();
            return redirect(route("login"));
        } else if (Auth::guard('psychiatric')->check()) {
            Auth::guard("psychiatric")->logout();
            return redirect(route("login"));
        } else if (Auth::guard('register')->check()) {
            Auth::guard("register")->logout();
            return redirect(route("login"));
        }
    }
}
