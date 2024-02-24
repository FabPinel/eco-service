<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\SendMailToSender;
use App\Mail\SendResponseMail;

class ContactController extends Controller
{

    public function index()
    {
        $messages = Contact::with('product')->orderBy('created_at', 'desc')->paginate(10);
        $totalMessages = Contact::count();
        return view('admin.messages.index', compact('messages', 'totalMessages'));
    }
    public function productsContact()
    {
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
        return view('shop.contactConfirmation', compact('contactFormData'));
    }

    public function sendMailResponse(Request $request)
    {
        $responseFormData = $request->validate([
            'emailFrom' => 'required',
            'emailTo' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $email = $request->emailTo;

        $responseMailData['message'] = $responseFormData['message'];
        $responseMailData['subject'] = $responseFormData['subject'];

        Mail::to($email)->send(new SendResponseMail($responseFormData, $responseMailData));
        return redirect()->back()->with('success', "L'email a bien été envoyé");
    }
}
