<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Branch;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    //

    public function index(Branch $branch)
    {
        $staff = Staff::with(['branch', 'gurantors'])->get();
        return view('staffs.index', compact(['staff','branch']));
    }

    public function store(Branch $branch)
    {
       
        $staff = Staff::with(['branch', 'gurantors'])->get();
        return view('staffs.index', compact(['staff']));
    }
}
