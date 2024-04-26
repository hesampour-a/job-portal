<?php

namespace App\Http\Controllers;

use App\Models\myJob;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', myJob::class);
        $filters = request()->only('search', 'min_salary', 'max_salary', 'category', 'experience');


        return view('job.index', [
            'jobs' => myJob::with('employer')->filter($filters)->latest()->get()
        ]);
    }

    public function show(myJob $job)
    {
        $this->authorize('view', $job);
        return view('job.show', [
            'job' => $job->load('employer.my_job')
        ]);
    }
}
