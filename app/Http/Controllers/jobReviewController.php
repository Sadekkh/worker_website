<?php

namespace App\Http\Controllers;

use App\Models\jobReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\DB;

class jobReviewController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'job_id' => $request->job_id,
            'employer_id' => $request->employer_id,
            'review' => $request->review,
            'comment' => $request->comment,


        ];
        $id = $request->id;
        jobReview::create($data + ['worker_id' => Auth()->id()]);

        if (Auth::user()->type == 2) {
            DB::table('job_requests')
                ->where('id', $id)
                ->update(['review' => 1]);
        } elseif (Auth::user()->type == 3) {
            DB::table('transport')
                ->where('id', $request->id)
                ->update(['review' => 1]);
        };
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
