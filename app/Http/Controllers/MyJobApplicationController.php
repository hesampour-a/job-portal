<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{

    public function index()
    {

        return view(
            'my-job-application.index',
            ['applications' => auth()->user()->JobApplications()->with([
                'my_job' => fn ($query) => $query->withCount('JobApplications')->withAvg('JobApplications', 'expected_salary')
            ])->latest()->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     */

    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();
        return redirect()->back()->with('success', 'job application deleted');
    }
}
