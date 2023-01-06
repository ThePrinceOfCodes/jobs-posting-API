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

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'title' => 'required|string|unique:job_categories,title',
        //     'job_category_id' => 'required'
        // ]);

        $job = Job::find($id);

        if(!$job)
        {
            return response()->json([
                'status' => true,
                'message' => 'job not found',
                'data' => null
            ], 404);
        }

        $job->title = $request->title;
        $job->description = $request->description;
        $job->job_category_id = $request->job_category_id;
        $job->location = $request->location;
        $job->requirements = $request->requirements;

        $job->update();

        return response()->json([
            'status' => true,
            'message' => 'Job updated',
            'data' => $job
        ]);
        
    }
}
