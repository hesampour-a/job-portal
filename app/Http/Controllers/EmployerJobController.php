<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\myJob;
use Illuminate\Http\Request;

class EmployerJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAnyEmployer', myJob::class);
        return view(
            'employer_job.index',
            [
                'jobs' => auth()->user()->employers
                    ->my_job()
                    ->with(['employer', 'JobApplications', 'JobApplications.user'])
                    ->get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', myJob::class);
        return view('employer_job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        $this->authorize('create', myJob::class);
        $validatedData = $request->validated();
        auth()->user()->employers->my_job()->create($validatedData);
        return redirect()->route('employer-jobs.index')
            ->with('success', 'job created successfully');
    }




    public function edit(myJob $employer_job)
    {
        $this->authorize('update', $employer_job);
        return view('employer_job.edit', ['job' => $employer_job]);
    }


    public function update(JobRequest $request, myJob $employer_job)
    {
        $this->authorize('update', $employer_job);
        $employer_job->update($request->validated());

        return redirect()->route('employer-jobs.index')
            ->with('success', 'job has edited successfuly');
    }

    public function destroy(myJob $employer_job)
    {
        $this->authorize('delete', $employer_job);
        $employer_job->delete();
        return redirect()->route('employer-jobs.index')->with('success', 'job deleted successfully');
    }
}
