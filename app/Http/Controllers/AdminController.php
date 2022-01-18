<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
   public function __construct()
   {
       $this->middleware('role:superadmin|manager');
   }

    function dashboard(){
        $messages = Contact::all();
        return view('admin.admin', compact(['messages']));
    }

    function user(){
        return view('admin.user');
    }

    function message(){
        return view('admin.message');
    }

    function subscribe(){
        return view('admin.newsletter');
    }
}
