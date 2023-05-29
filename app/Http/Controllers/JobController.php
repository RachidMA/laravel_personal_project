<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Repository\IJobRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public $job;

    public function __construct(IJobRepository $job)
    {
        $this->job = $job;
    }

    //1) Display Home Page
    public function home()
    {
        return view('welcome');
    }
    //2)Show to jobs
    public function showAll()
    {
        //Get all jobs
        $jobs = $this->job->getAllJobs();

        //return all jobs
        return view('jobs.allJobs')->with('jobs', $jobs);
    }

    //3)Show details of single job
    public function jobDetails($id)
    {
        $job_data = Job::find($id);

        if (!$job_data) {
            abort(404);
        }
        return view('jobs.job_details')->with('job_data', $job_data);
    }

    //4)Create job form
    public function createJob()
    {
        //return form to create job
        return view('jobs.create');
    }

    //5)Store form data in database
    public function storeJob(Request $request)
    {
        $request->validate([
            'full-name' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'phone' => ['required', 'regex:/^[0-9+\-\(\)\s]*$/'],
            'businessType' => ['required'],
            'profession' => ['required'],
            'picture' => ['required'],
            'description' => ['required'],
        ]);

        $data = $request->all();


        //Store image uploaded by user
        if ($image = $request->file('picture')) {
            $imageName = time() . "." . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $data['picture'] = "$imageName";
        }
        $this->job->storeJob($data);

        return redirect()->route('welcome')->with('message', 'Your profile has been created successfully');
    }

    //6)Edit job post
    public function edit_job(Request $request)
    {
        $job_id = $request->job_id;
        //Get the job data from database to populate the form
        //with where method can chain more conditions(first() because it returns array)
        //if you use find method. no chaining
        $job = Job::where('id', $job_id)->first();

        // dd($job);

        //get all 
        //Return the form to edit the job
        return view('jobs.edit_job_form')->with('job', $job);
    }

    //7) Store data of the updated job
    public function update_job(Request $request)
    {
        // dd($request->job_id);

        //VALIDATE REQUEST AND SENT DATA TO UPDATE REPOSITORY
        $request->validate([
            'full-name' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'phone' => ['required', 'regex:/^[0-9+\-\(\)\s]*$/'],
            'businessType' => ['required'],
            'profession' => ['required'],
            'picture' => ['required'],
            'description' => ['required'],
        ]);

        //RETURN DASHBOARD WITH SECCESSFUL MESSAGE


        $data = $request->all();

        //Store image uploaded by user
        if ($image = $request->file('picture')) {
            $imageName = time() . "." . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $data['picture'] = "$imageName";
        }
        $this->job->updateJob($request->job_id, $data);

        //Get all Job posts
        $jobs = Auth::user()->job;

        return redirect()->route('jobs.userDashboard', Auth::user()->name)
            ->with('jobs', $jobs)
            ->with('message', 'Your job post was successfully updated');
    }

    //8)Detail page for single job post requested from user who created the job
    public function jobDashboardDetails(Request $request)
    {
        // dd($request->name, $request->job_id);
        $job = Job::where('id', $request->job_id)->first();
        // dd($job);
        return view('jobs.dashboard_job_details')->with('job', $job);
    }

    //9)Delete single job post
    public function deleteJob($job_id)
    {


        //Image url
        $image_url = Job::find($job_id)->first()->picture;

        //Delete image from public/images folder
        $image_path = public_path('images/') . $image_url;

        //Check if image exist in folder
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        //find job than delete it
        Job::find($job_id)->delete();

        //Send data of left jobs that were created by user
        //back to the dashboard
        $jobs = Auth::user()->job;

        return redirect()->route('jobs.userDashboard', Auth::user()->name)
            ->with('jobs', $jobs)
            ->with('message', 'The job post was successfully deleted');
    }

    //10)User Dashboard
    public function userDashboard()
    {
        //Get user object
        $user = Auth::user();

        //Get all jobs that are created by the user
        $created_jobs = $user->job;

        // dd($created_jobs);
        return view('jobs.userDashboard')->with('jobs', $created_jobs);
    }

    //11)Search for job
    public function search(Request $request)
    {
        // $jobs = Job::where('profession', 'like', '%'.$request->profession)
        //             ->where('city', 'like', '%'.$request->city)->get();
        $jobs = Job::where(function ($query) use ($request) {
            $query->where('full_name', 'like', '%' . $request->profession . '%')
                ->orWhere('profession', 'like', '%' . $request->profession . '%');
        })
            ->where('city', 'like', '%' . $request->city)
            ->get();

        //We redirect to save message in the session
        if ($jobs->isEmpty()) {
            return redirect()->route('welcome')->with('error', 'Sorry: No resutls has been found');
        }
        //we return view. Because we need to pass data to view
        return view('jobs.allJobs')->with('jobs', $jobs);
    }

    //12)Admin Dashboard
    public function adminDashboard()
    {
        //Get all jobs from database
        $jobs = Job::all();
        return view('jobs.admin_dashboard')->with('jobs', $jobs);
    }

    //admin Dashboard Job Details
    public function adminDashboardJobDetails(Request $request)
    {
        //find job
        $job_id = $request->job_id;
        // $job = Job::where('id', $job_id)->first();
        $job = Job::find($job_id);

        //Get job comments
        $job_comments = $job->comments()->get();
        // dd($job);
        // return view('jobs.admin-dashboard-job-details')->with(['job'=>$job, 'comments'=>$job_comments]);
        return view('jobs.admin-dashboard-job-details ', ['job' => $job, 'comments' => $job_comments]);
    }

    //Admin delete job
    public function adminDashboardJobDelete(Request $request)
    {
        //Get job id
        $job_id = $request->job_id;

        //Image url
        $image_url = Job::find($job_id)->first()->picture;

        //Delete image from public/images folder
        $image_path = public_path('images/') . $image_url;

        //Check if image exist in folder
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        //find job than delete it
        Job::find($job_id)->delete();
        //Send data of left jobs that were created by user
        //back to the dashboard
        $jobs = Job::all();

        return redirect()->route('admin-dashboard', Auth::user()->name)
            ->with('jobs', $jobs)
            ->with('message', 'The job post was successfully deleted');
    }
}
