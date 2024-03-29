<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Training;
use App\Models\TrainingTrack;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainings = Training::latest()->get();
        return view('register.trainings', ["data" => $trainings]);
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
            "title" => "required|string",
            "description" => "required|string",
            "video" => "required|mimes:mp4"
        ]);

        $uniqueid = uniqid();
        $extension = $request->file('video')->getClientOriginalExtension();
        $filename = Carbon::now()->format('Ymd') . '_' . $uniqueid . '.' . $extension;

        $file = $request->file('video');
        Storage::disk('public')->put($filename, file_get_contents($file));
        $fileUrl = Storage::url($filename);
        $training = new Training;
        $training->title = $request->title;
        $training->description = $request->description;
        $training->video = $fileUrl;
        $training->save();

        return redirect("/register/training");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $training = Training::where("id", $id)->first();
        if (!empty($training)) {
            $data = Applicant::where('id', Auth::id())->first();
            if ($data->status == "pApproved") {
                return view('applicant.playlist', ["training" => $training]);
            } else {
                return view('applicant.notraining');
            }
        } else {
            return redirect("/applicant/training");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Training $training)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $training = Training::find($id);
        if ($training) {
            $filename = basename($training->video);
            Storage::disk('public')->delete($filename);
            $training->delete();

            return redirect("/register/training");
        }

        return redirect("/register/training")->with('error', 'Training record not found.');
    }

    public function applicantList()
    {
        $allTrainings = Training::count();
        $allApplicantTraining = TrainingTrack::where('applicant_id', Auth::guard('applicant')->id())->count();
        if ($allTrainings == $allApplicantTraining) {
            $finished = true;
        } else {
            $finished = false;
        }
        $trainings = Training::latest()->get();
        $data = Applicant::where('id', Auth::id())->first();
        if ($data->status == "pApproved") {
            return view('applicant.training', ["data" => $trainings, 'finished' => $finished]);
        } else {
            return view('applicant.notraining');
        }
    }

    public function directorList()
    {
        $trainings = Training::latest()->get();
        return view('director.training', ["data" => $trainings]);
    }

    public function directorShow($id)
    {
        $training = Training::where("id", $id)->first();
        if (!empty($training)) {
            return view('director.playlist', ["training" => $training]);
        } else {
            return redirect("/director/training");
        }
    }

    public function public($id)
    {
        $training = Training::where("id", $id)->first();
        if (!empty($training)) {
            return view('training', ["training" => $training]);
        } else {
            return redirect(back());
        }
    }

    public function trainingTrack($id)
    {
        $training = Training::find($id);
        if ($training != null) {
            $ifTrainingExist = TrainingTrack::where('applicant_id', Auth::guard('applicant')->id())->where('training_id', $id)->first();
            if ($ifTrainingExist == null) {
                $track = new TrainingTrack;
                $track->training_id = $id;
                $track->applicant_id = Auth::guard('applicant')->id();
                $track->created_at = now();
                $track->updated_at = null;
                $track->save();
                return redirect("/applicant/playlist/$id");
            } else {
                return redirect("/applicant/playlist/$id");
            }
            return redirect("/applicant/playlist/$id");
        } else {
            return back()->withErrors('Training not found');
        }
    }
}
