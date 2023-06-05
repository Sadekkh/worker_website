<?php

namespace App\Http\Controllers;

use App\Models\jobRequest;
use Illuminate\Http\Request;
use App\Models\postJob;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;



class jobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->type == 2) {
            $dates = jobRequest::select('date_start', 'date_end')->where('accept', 1)->get();
            $data = postJob::whereNotIn('id', function (Builder $q) {
                $q->select('job_id')->from('job_requests')->where('worker_id', Auth::id());
            })->where(function ($s) use ($dates) {
                foreach ($dates as $date_range) {
                    $start_date = $date_range['date_start'];
                    $end_date = $date_range['date_end'];
                    $s->whereNotBetween('date_start', [$start_date, $end_date])->whereNotBetween('date_end', [$start_date, $end_date]);
                }
            })->get();
        } elseif ((Auth::user()->type == 3))
            $data = DB::table('post_jobs')->where('worker_left', 0)->get();

        return view('jobs.joblist', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.jobpost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([]);

        postJob::create($request->all() + ['user_id' => Auth()->id(), 'worker_left' => $request->worker_number]);



        return redirect()->route('jobs.create')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function details(Request $request)
    {
        $id = $request->id;
        $userid = $request->userid;
        $data["user"] = DB::select("select * from users where id =  $userid ;");
        $data["rev"] = DB::select("select avg(review) as review  from job_reviews where employer_id =  $userid ;");
        $data["post"] = DB::select("select * from post_jobs where id =  $id ;");
        $data["work"] = DB::select("select job_requests.id, users.*
        from job_requests left join users 
        on job_requests.worker_id = users.id
        where job_requests.job_id = $id and job_requests.accept =1");
        return response()->json($data);
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
    public function destroys(string $id)
    {
        DB::delete('delete from post_jobs where id = ?', [$id]);
        return redirect()->back();
    }
}
