<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    //function untuk menampilkan view home
    public function index(){
        return view('index', [
            'title' => 'Home'
        ]);
    }
}
