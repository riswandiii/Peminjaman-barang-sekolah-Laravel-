<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class CustumerController extends Controller
{
    //function untuk menampikkan view custumer
    public function index(Request $request)
    {
       if($request->search){
            return view('dashboard.custumer.custumer', [
                'title' => 'Data Custumer All',
                'custumers' => User::where('username', 'LIKE', '%' . $request->search)->latest()->paginate(10)
            ]);
       }else{
            return view('dashboard.custumer.custumer', [
                'title' => 'Data Custumer All',
                'custumers' => User::all()
            ]);
       }
    }

    // function untuk detail custumer
    public function detail(User $user)
    {
        return view('dashboard.custumer.detail', [
            'title' => 'Detail ' . $user->username,
            'user' => $user
        ]);
    }

}
