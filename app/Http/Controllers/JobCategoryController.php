<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:job_categories,title',
        ]);

        $jobCategory = new JobCategory;

        $jobCategory->title = $request->title;
        $jobCategory->user_id = auth()->id();

        $jobCategory->save();

        return response()->json([
            'status' => true,
            'message' => 'Job category created',
            'data' => $jobCategory
        ], 201);
    }

    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'records retrived',
            'data' => JobCategory::all(),
        ], 201);
    }
}
