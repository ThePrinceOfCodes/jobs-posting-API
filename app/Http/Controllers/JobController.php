<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:job_categories,title',
            'job_category_id' => 'required'
        ]);

        $job = new Job;

        $job->title = $request->title;
        $job->description = $request->description;
        $job->job_category_id = $request->job_category_id;
        $job->location = $request->location;
        $job->requirements = $request->requirements;

        $job->save();

        return response()->json([
            'status' => true,
            'message' => 'Job created',
            'data' => $job
        ], 201);
    }

    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'records retrived',
            'data' => Job::all(),
        ], 201);
    }
}
