<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\SendMailToSender;

class ContactController extends Controller
{

    public function index() {
        $messages = Contact::all();
        return view('admin.messages.index', compact('messages'));
    }
    public function productsContact() {
        $products = Product::all();
    return view('shop.contact', compact('products'));
    }
    public function sendMail(Request $request)
    {
        $contactFormData = $request->validate([
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'firstname' => 'nullable',
            'lastname' => 'nullable',
            'enterprise' => 'nullable',
            'id_product' => 'nullable',
            'phone' => 'nullable',
        ]);

        $contact = new Contact($contactFormData);
        $contact->save();

        $email = $request->email;
        $mailData = [
            'title' => $contactFormData['subject'],
            'body' => $contactFormData['message'],
        ];
        if (isset($contactFormData['firstname'])) {
            $mailData['firstname'] = $contactFormData['firstname'];
        }

        if (isset($contactFormData['lastname'])) {
            $mailData['lastname'] = $contactFormData['lastname'];
        }
        if (isset($contactFormData['enterpriseName'])) {
            $mailData['enterpriseName'] = $contactFormData['enterpriseName'];
        }
        if (isset($contactFormData['id_product'])) {
            $mailData['id_product'] = $contactFormData['id_product'];
        }
        $mailData['email'] = $contactFormData['email'];
        $mailData['message'] = $contactFormData['message'];


        Mail::to('gayraud854@gmail.com')->send(new SendMail($mailData, $contactFormData));
        Mail::to($email)->send(new SendMailToSender($mailData, $contactFormData));
        return "L'email à bien été envoyé";
    }
}
