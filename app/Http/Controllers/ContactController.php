<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //function untuk menampilkan view contact
    public function index()
    {
        return view('contact.contact', [
            'title' => 'Contact Us'
        ]);
    }
}
