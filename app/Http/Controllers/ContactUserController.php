<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUserController extends Controller
{
    //This controller is resposible of sending back to sent email for
    //When customer dicided to contact the user(Handyman)

    public function contactForm(Request $request)
    {
        //Get User(handyman) whom the customer want to email
        $user_name = $request->name;
        $user_id = $request->user_id;

        // dd($user_name, $user_id);

        return view('emails.contact_form_display')->with('user_id', $user_id);
    }

    
}
