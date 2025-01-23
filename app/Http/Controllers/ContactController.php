<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactForm\ContactFormRequest;
use App\Mail\ContactFormMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(ContactFormRequest $request)
    {
        $data = $request->validated();

        Contact::create($data);

        Mail::to('farhad.abbasov2003@gmail.com')->send(new ContactFormMail($data));


        return response()->json(['message' => 'Your message has been sent successfully!'], 200);
    }
}
