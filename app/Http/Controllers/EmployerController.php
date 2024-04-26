<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployerController extends Controller
{


    public function __construct()
    {
        $this->authorizeResource(Employer::class);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        auth()->user()->employers()->create($request->validate([
            'company_name' => 'required|unique:employers,company_name',
        ]));

        return redirect()->route('jobs.index')->with('success', 'Your Employer Account has created');
    }
}
