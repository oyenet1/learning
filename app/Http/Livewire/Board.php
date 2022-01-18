<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Staff;
use App\Models\Branch;
use App\Models\Payment;
use Livewire\Component;
use App\Models\Security;

class Board extends Component
{
    public function render()
    {
        $users = User::all();
        $branches = Branch::where('user_id', '!=', null)->get();
        $staffs = Staff::all();
        $securities = Security::all();
        $payments = Payment::latest()->sum('amount');
        return view('livewire.board', compact(['users', 'branches', 'staffs', 'securities', 'payments']));
    }
}
