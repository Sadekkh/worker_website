<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["jobs"] = DB::select("select count(*) as jobs from post_jobs");
        $data["requests"] = DB::select("select count(*) as jobs from job_requests");
        $data["curent"] = DB::select("select count(*) as jobs from post_jobs where date_start< CURDATE() and date_end >CURDATE();");
        $data["users"] = DB::select("select count(*) as users from users ;");
        $data["chart1"] = DB::select("SELECT type as t, COUNT(*) as c FROM post_jobs GROUP BY type;");
        $data["chart2"] = DB::select("SELECT payement_type as t, COUNT(*) as c FROM job_requests GROUP BY payement_type;");
        $data["chart3"] = DB::select("SELECT place as t, COUNT(*) as c FROM post_jobs GROUP BY place;");

        return view('admins.dash', compact('data'));
    }
    public function index1()
    {
        $data = DB::table('users')->get();

        return view('admins.users', compact('data'));
    }
    public function index2()
    {
        $data = DB::select("select post_jobs.* ,users.name
        from post_jobs
        left join users
        on post_jobs.user_id = users.id");
        return view('admins.jobs', compact('data'));
    }
    public function index3()
    {
        $data = DB::select("select job_requests.* , users.name, users.location,  post_jobs.title 
        from job_requests
        left join users
        on job_requests.worker_id = users.id
        left join post_jobs
        on job_requests.job_id = post_jobs.id");
        return view('admins.requests', compact('data'));
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
        //
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
        DB::delete('delete from users where id = ?', [$id]);
        return redirect()->back();
    }
}
