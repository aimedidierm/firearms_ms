<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Application;
use App\Models\Certificate;
use App\Models\Training;
use App\Models\TrainingTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Sms;

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
            'email' => ['required', 'email', new \App\Rules\UniqueEmailAcrossTables],
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
    public function update(Request $request)
    {
        $request->validate([
            "phone" => "required|string",
            "address" => "required|string",
            "firstPassword" => "required|string",
            "confirmPassword" => "required|string"
        ]);
        if ($request->firstPassword == $request->confirmPassword) {
            $applicant = Applicant::where("id", Auth::guard("applicant")->id())->first();
            $applicant->phone = $request->phone;
            $applicant->address = $request->address;
            $applicant->password = bcrypt($request->firstPassword);
            $applicant->update();
            return redirect("/applicant");
        } else {
            return redirect("/applicant")->withErrors("Password not match");
        }
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

    public function examList()
    {
        $data = Applicant::latest()->where("rejected", false)->where("status", "trainingPassed")->get();
        return view("register.exam", ["data" => $data]);
    }

    public function examFail($id)
    {
        $applicant = Applicant::where("id", $id)->where("rejected", false)->first();
        $applicant->status = "examPassed";
        $applicant->update();
        return redirect("/register/exam");
    }

    public function examRetake($id)
    {
        $applicant = Applicant::where("id", $id)->where("rejected", false)->first();
        $applicant->status = "trainingPassed";
        $applicant->update();
        return redirect("/register/retake");
    }

    public function examPermanentFail($id)
    {
        $applicant = Applicant::where("id", $id)->where("rejected", false)->first();
        $applicant->rejected = true;
        $applicant->update();
        return redirect("/register/retake");
    }

    public function examPass($id)
    {
        $randomNumber = str_pad(mt_rand(0, 999999), 10, '0', STR_PAD_LEFT);
        $exists = Applicant::where('serialNumber', $randomNumber)->exists();
        while ($exists) {
            $randomNumber = str_pad(mt_rand(0, 999999), 10, '0', STR_PAD_LEFT);
            $exists = Applicant::where('serialNumber', $randomNumber)->exists();
        }
        $applicant = Applicant::where("id", $id)->where("rejected", false)->first();
        $applicant->status = "approved";
        $applicant->serialNumber = $randomNumber;
        $applicant->update();
        $randomNumber = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $exists = Certificate::where('serialNumber', $randomNumber)->exists();
        while ($exists) {
            $randomNumber = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $exists = Certificate::where('serialNumber', $randomNumber)->exists();
        }
        $certificate = new Certificate;
        $certificate->serialNumber = $randomNumber;
        $certificate->applicant_id = $id;
        $certificate->created_at = now();
        $certificate->updated_at = null;
        $certificate->save();
        $certificateUrl = "localhost:8000/certificate/$certificate->serialNumber";
        $message = "Hello " . $applicant->names . " your application for firearms had been approved you can find your certificate at " . $certificateUrl . " thank you.";
        $sms = new Sms();
        $sms->recipients([$applicant->phone])
            ->message($message)
            ->sender(env('SMS_SENDERID'))
            ->username(env('SMS_USERNAME'))
            ->password(env('SMS_PASSWORD'))
            ->apiUrl("www.intouchsms.co.rw/api/sendsms/.json")
            ->callBackUrl("");
        $sms->send();
        return redirect("/register/exam");
    }

    public function examFailList()
    {
        $data = Applicant::latest()->where("rejected", false)->where("status", "examPassed")->get();
        return view("register.retake", ["data" => $data]);
    }

    public function ending()
    {
        $allTrainings = Training::count();
        $allApplicantTraining = TrainingTrack::where('applicant_id', Auth::guard('applicant')->id())->count();
        if ($allTrainings == $allApplicantTraining) {
            $finished = true;
        } else {
            $finished = false;
        }
        if ($finished) {
            $applicant = Applicant::find(Auth::guard("applicant")->id());
            $applicant->status = "trainingPassed";
            $applicant->update();
            return redirect("/applicant/status");
        } else {
            return back()->withErrors('You have to finish all trainings');
        }
    }
}
