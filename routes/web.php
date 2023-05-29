<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactUserController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Create Admin routes
Route::middleware(['adminDashboard'])->group(function () {
    Route::get('/dashboard/{name}', [JobController::class, 'adminDashboard'])->name('admin-dashboard');
    Route::get('/dashboard/{name}/job/{job_id}', [JobController::class, 'adminDashboardJobDetails'])->name('dashboard');
    Route::get('/dashboard/{name}/{job_id}', [JobController::class, 'adminDashboardJobDelete'])->name('admin-dashboard-job-delete');
    // TODO: CREATE ROUTE TO DELETE DELETE COMMENTS FROM EACH JOB DETAILS PAGE
    Route::get('/dashboard/{name}/job/{job_id}/comment', [CommentController::class, 'commentDelete'])->name('comment-delete');
});



Route::get('/', [JobController::class, 'home'])->name('welcome');
//Show all jobs
Route::get('/home/jobs', [JobController::class, 'showAll'])->name('showAll');


//Show details of single job
Route::get('/job/details/{id}', [JobController::class, 'jobDetails'])->name('job-details');

//Search:find job by worker and city or by job profession in job_type and description
Route::get('/search', [JobController::class, 'search'])->name('search');


//User Dashoard
Route::middleware(['auth'])->group(function () {
    //Routes that are available if user is logged in
    Route::get('/user_dashboard/{name}', [JobController::class, 'userDashboard'])->middleware('userDashboard')->name('jobs.userDashboard');
    //Return form to create job post
    //Add middleware to check if user is loged in
    Route::get('/create-job', [JobController::class, 'createJob'])->name('create-job');

    //Store data coming from form on method post
    Route::post('/store-job', [JobController::class, 'storeJob'])->name('store-job');

    //Edit job post form
    Route::get('/edit/{job_id}', [JobController::class, 'edit_job'])->name('edit_job');

    //Store the changes in database
    Route::post('/edit/{job_id}', [JobController::class, 'update_job'])->name('update_job');
    //Delete job(This action is only done by the user who created the job and admin)
    // Route::post('/job/{id}', [JobController::class, 'delete'])->name('delete');

    //Create route to show Job detail from user dashboard(if user wants to edit or delete own job)
    Route::get('/user_dashboard/{name}/job/{job_id}', [JobController::class, 'jobDashboardDetails'])->name('jobDashboardDetails');

    //Delete single job post by job post created 
    Route::get('/delete_job/job/{id}', [JobController::class, 'deleteJob'])->name('user_dashboard_job_delete');

    //Edit single job post by job post created
    // Route::post('/edit' , [JobController::class, 'edit'])->name('user_dashboard_job_edit');

});

Auth::routes();

// Could be deleted later
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Routes for customers to contact handyman via email
Route::get('/contact/form/{name}/{user_id}', [ContactUserController::class, 'contactForm'])->name('send_email_form');

//Route responsible for sending email from customer to handyman(user)
Route::post('/contact/email/send', [ContactController::class, 'sendEmail'])->name('contact.send');

//Store comment for related job
Route::post('/job/comment/{id}/store', [CommentController::class, 'addComment'])->name('store-comment');
