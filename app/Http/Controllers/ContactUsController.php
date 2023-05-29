<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function contactSave(Request $request){
        $contact = new ContactUs();
        $name =  $request->first.' '.$request->last;
        $contact->name = $name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        $details = [
            'title' => 'Mail From easyseo.ai',
            'body' => 'Your Contact Us Details Sent To easyseo.ai Management Teams'
        ];

        Mail::to($request->email)->send(new ContactMail($details));

        $details = [
            'title' => 'Mail From easyseo.ai',
            'subject' => $request->subject,
            'body' => 'Contact Us Form Submited By The '.$request->email
        ];

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($details));

        return redirect()->route('web.contact_us')->with('message','Contact Us Form Summitted Successfully');
    }
}
