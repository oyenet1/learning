<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $perPage = 24;
    public $search = "";


    public function render()
    {
        $search = '%' . $this->search . '%';
        $users = User::with(['roles', 'permissions'])->where('name', 'LIKE', $search)->orderBy('updated_at', 'desc')->paginate($this->perPage);
        return view('livewire.users', compact('users'));
    }
}
