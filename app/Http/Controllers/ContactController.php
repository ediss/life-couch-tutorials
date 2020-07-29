<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Mail;

class ContactController extends Controller
{
    public function index(Request $request) {

        if ($request->isMethod('post')) {
            $name   = $request->input('txtName');
            $email  = $request->input('txtEmail');
            $msg    = $request->input('txtMsg');

            $data = [
                'name'      => $name,
                'email'     => $email,
                'msg'       => $msg
            ];

            Mail::send(['text'=>'mails.contact'], $data, function($message) use ($data) {
                $message->to('psihohorizont@gmail.com', 'Kontakt')->subject ('Kontakt')->replyTo($data['email']);
                $message->from($data['email'], $data['name'] );
            });

            return Redirect::to(URL::previous() . "#contact")->with('info','Hvala na obraćanju. Primili smo Vašu poruku!');;
        }
        return view('contact');
    }
}
