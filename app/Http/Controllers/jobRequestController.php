<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jobRequest;
use App\Models\postJob;
use App\Models\User;
use App\Models\transport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;
use Exception;


class jobRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = DB::select("select users.id, users.name, users.location, job_requests.payement_type, 
        job_requests.budget, post_jobs.id as jobid , post_jobs.title ,job_requests.accept, job_requests.id as job
        from job_requests
        left join users
        on job_requests.worker_id = users.id
        left join post_jobs
        on job_requests.job_id = post_jobs.id
        where post_jobs.user_id = " . Auth()->id() . " and job_requests.accept!=2;");
        return view('requests.list', compact('datas'));
    }
    public function map()
    {

        return view('map');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = Auth::id();
        if (Auth::user()->type == 2) {
            $data = DB::select(" select job_requests.*, post_jobs.title,post_jobs.user_id
        from job_requests
        left join post_jobs
        on job_requests.job_id = post_jobs.id
        where job_requests.worker_id = $id;");
        } elseif (Auth::user()->type == 3) {
            $data = DB::select("select transports.*, post_jobs.title,post_jobs.user_id
        from transports

        left join post_jobs
        on transports.job_id = post_jobs.id
        where transports.worker_id = $id;");
        } elseif (Auth::user()->type == 1) {
            $data = DB::select(" select* from post_jobs
        where post_jobs.user_id =$id;");
        }
        return view('requests.myjobs', compact('data'));
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
        jobRequest::create($data + ['worker_id' => Auth()->id()]);



        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = DB::select("select users.*, avg(job_reviews.review) as review 
        from users
         left join job_reviews
        on users.id = job_reviews.worker_id
        where users.id =  $id ;");

        return response()->json($user);
    }
    public function accept(string $id, string $jobid)
    {

        $user = DB::table('post_jobs')
            ->where('id', $jobid);
        try {

            $user->decrement('worker_left');
        } catch (\Exception $e) {
            return redirect()->back()->with('alert', 'أكملت العدد المخصص');
        }
        $worker = DB::table('job_requests')->where('id', $id)->get();

        $d = DB::table('job_requests')->where('worker_id', $worker[0]->worker_id)
            ->whereBetween('date_start', [$worker[0]->date_start, $worker[0]->date_end])
            ->orWhereBetween('date_end', [$worker[0]->date_start, $worker[0]->date_end]);

        $d->update(['accept' => 2]);
        DB::table('job_requests')
            ->where('id', $id)
            ->update(['accept' => 1]);
        return redirect()->back();
    }
    public function cancel(string $id, string $jobid)
    {

        DB::table('job_requests')
            ->where('id', $id)
            ->update(['accept' => 0]);
        $user = DB::table('post_jobs')
            ->where('id', $jobid);
        $user->increment('worker_left');
        return redirect()->back();
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
        DB::delete('delete from job_requests where id = ?', [$id]);
        return redirect()->back();
    }
    public function apply(string $id)
    {
        //
    }
    public function calendar()
    {
        $events = array();
        $id = Auth::id();
        if (Auth::user()->type == 1) {
            $bookings = DB::table('post_jobs')->where("user_id", $id)->get();
            foreach ($bookings as $booking) {
                $color = null;
                if ($booking->state == '0') {
                    $color = '#DFFF00';
                }
                if ($booking->state == '1') {
                    $color = '#DE3163';
                }
                if ($booking->state == '2') {
                    $color = '#6495ED';
                }
                $events[] = [
                    'id'   => $booking->id,
                    'title' => $booking->title,
                    'start' => $booking->date_start,
                    'end' => $booking->date_end,
                    'color' => $color
                ];
            }
        }
        if (Auth::user()->type == 2) {
            $bookings = DB::table('job_requests')->join('post_jobs', 'job_requests.job_id', '=', 'post_jobs.id')
                ->select('job_requests.*', 'post_jobs.*')->where("worker_id", $id)->get();
            foreach ($bookings as $booking) {
                $color = null;
                if ($booking->accept == '0') {
                    $color = '#DFFF00';
                }
                if ($booking->accept == '1') {
                    $color = '#DE3163';
                }
                if ($booking->accept == '2') {
                    $color = '#6495ED';
                }
                $events[] = [
                    'id'   => $booking->id,
                    'title' => $booking->title,
                    'start' => $booking->date_start,
                    'end' => $booking->date_end,
                    'color' => $color
                ];
            }
        }
        if (Auth::user()->type == 3) {
            $bookings = DB::table('transports')->join('post_jobs', 'transports.job_id', '=', 'post_jobs.id')
                ->select('transports.*', 'post_jobs.*')->where("worker_id", $id)->get();
            foreach ($bookings as $booking) {
                $color = null;
                if ($booking->accept == '0') {
                    $color = '#DFFF00';
                }
                if ($booking->accept == '1') {
                    $color = '#DE3163';
                }
                if ($booking->accept == '2') {
                    $color = '#6495ED';
                }
                $events[] = [
                    'id'   => $booking->id,
                    'title' => $booking->title,
                    'start' => $booking->date_start,
                    'end' => $booking->date_end,
                    'color' => $color
                ];
            }
        }

        return view('requests.calendar', ['events' => $events]);
    }
}
