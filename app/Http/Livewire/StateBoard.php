<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Branch;
use Livewire\Component;
use App\Models\Security;

class StateBoard extends Component
{
    public function render()
    {
        $users = User::where('branch_id', auth()->user()->branch->id)->get();
        $branches = Branch::where('user_id', '!=', null)->get();
        $staffs = Staff::where('branch_id', auth()->user()->branch->id)->get();
        $securities = Security::where('branch_id', auth()->user()->branch->id)->get();
        $payments = Payment::latest()->sum('amount')->get();
        return view('livewire.state-board', compact(['users', 'branches', 'staffs', 'securities', 'payments']));
    }
}
