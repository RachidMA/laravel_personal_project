<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormEmail;
use App\Models\Job;
use App\Models\User;
use App\Notifications\EmailSentNotification;
use Exception;
use Illuminate\Http\Request;
// use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    //Send email from customer to handyman(user)
    public function sendEmail(Request $request)
    {
        //validate form data
        $request->validate([
            'name'=>['required'],
            'email'=>['required', 'email'],
            'phone'=>['required','numeric', 'digits:10', 'regex:/^[0-9+\-\(\)\s]*$/' ],
            'message'=>['required']
        ]);

        //Handyman full name
        $job = Job::where('user_id', $request->handyman_id)->first();
        //get data from form
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>$request->message,
            'handyman'=>$job
        ];

        // Get customer email, so we can send him back notification
        $customer_email = $data['email'];
            try{

                //SEND EMAIL TO HANDYMAN
                Mail::to($job->user->email)->send(new ContactFormEmail($data));

                //Send notification back to customer
                Notification::route('mail', $customer_email)->notify(new EmailSentNotification($data));


                // return redirect()->route('search')->with('message', 'Your message has been sent');
                return back()->with(['message' => 'Your message has been sent', 'id' => $job->id]);
            }catch(Exception $e)
            
            {
                //Send back error
                return back()->with('error', 'Email was not sent. Something went wrong: ' . $e->getMessage());

            }
        
    }
}
