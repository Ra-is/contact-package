<?php

namespace Rais\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Rais\Contact\Mail\ContactMailable;
use Rais\Contact\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact::contact');
    }

    public function send(Request $request)
    {
        try{
            Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->message,$request->name));
            Log::debug('email send succ');
        }catch(Exception $exception)
        {
            Log::debug('error');
            Log::debug(json_encode($exception->getMessage()));
            Log::debug('end error');
        }
          Contact::create($request->all());
          return redirect(route('contact'));
    }
}
