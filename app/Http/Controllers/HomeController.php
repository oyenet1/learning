<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        if (Auth::user()->hasRole(['superadmin', 'manager'])) {
            // return view('admin.admin');
            return redirect('/admin')->with('messages', Contact::all());
        } else {
            // return view('user.dashboard');
            return redirect('/user');
        }
    }
}
