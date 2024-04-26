<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Http\Controllers\Controller;
use App\Models\myJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JobApplicationController extends Controller
{


    public function create(myJob $job)
    {

        Gate::authorize('apply', $job);
        return view('job_application.create', ['job' => $job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(myJob $job, Request $request)
    {
        $validateData = $request->validate([
            'expected_salary' => 'required|min:1',
            'cv' => 'required|mimes:pdf|max:2048'
        ]);

        $file = $request->file('cv');
        $path = $file->store('cvs', 'private');


        $job->JobApplications()->create([
            'user_id' => $request->user()->id,
            'cv_path' => $path,
            'expected_salary' => $validateData['expected_salary'],
        ]);
        return redirect()
            ->route('jobs.show', $job)
            ->with('success', 'job application submitted');
    }


    public function destroy(JobApplication $jobApplication)
    {
        //
    }
}
