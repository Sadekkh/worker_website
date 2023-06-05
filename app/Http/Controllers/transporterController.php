<?php

namespace App\Http\Controllers;

use App\Models\transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;



class transporterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = DB::select("select users.id, users.name, users.location, transports.payement_type, 
        transports.budget, post_jobs.id as jobid , post_jobs.title ,transports.accept, transports.id as job
        from transports
        left join users
        on transports.worker_id = users.id
        left join post_jobs
        on transports.job_id = post_jobs.id
        where  post_jobs.user_id = " . Auth()->id() . " and transports.accept != 2;");
        return view('transport.list', compact('datas'));
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
            'emp_id' => $request->emp_id,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'time_start' => $request->time_start,
            'date_start' => $request->date_start,
            'time_end' => $request->time_end,
            'payement_type' => $request->payement_type,
            'budget' => $request->budget,

        ];
        transport::create($data + ['worker_id' => Auth()->id()]);



        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = DB::select("select users.*, avg(review) as review 
        from users
        left join job_reviews
        on users.id = job_reviews.worker_id
        where users.id =  $id ;");

        return response()->json($user);
    }
    public function accept(string $id, string $jobid)
    {

        $worker = DB::table('transports')->where('id', $id)->get();


        $d = DB::table('transports')->where('worker_id', $worker[0]->worker_id)
            ->whereBetween('date_start', [$worker[0]->date_start, $worker[0]->date_end])
            ->orWhereBetween('date_end', [$worker[0]->date_start, $worker[0]->date_end]);

        $d->update(['accept' => 2]);

        DB::table('transports')
            ->where('id', $id)
            ->update(['accept' => 1]);
        DB::table('post_jobs')
            ->where('id', $id)
            ->update(['state' => 1]);
        return redirect()->back();
    }
    public function cancel(string $id, string $jobid)
    {
        DB::table('post_jobs')
            ->where('id', $jobid)
            ->update(['state' => 0]);

        DB::table('transports')
            ->where('id', $id)
            ->update(['accept' => 0]);

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
        $data["work"] = DB::select("select job_requests.*, users.*
        from job_requests left join users 
        on job_requests.worker_id = users.id
        where job_requests.job_id = $id and job_requests.accept =1");
        $data["trans"] = DB::select("select transports.id ,users.name, users.mnumber, users.location
         from transports
         left join users
         on transports.worker_id = users.id
          where job_id = $id and accept = 1");
        $data['rev1'] = DB::select("select * from job_reviews where 
        job_id = $id and worker_id = $userid and employer_id = " . Auth()->id() . "; ");
        return response()->json($data);
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
