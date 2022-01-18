<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class Board extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $users, $messages, $roles, $statics;

    public function __construct($users, $messages, $roles, $statics)
    {
        //
        $this->users = $users;
        $this->messages = $messages;
        $this->roles = $roles;
        $this->statics = $statics;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $users = User::all();
        return view('components.board', compact(['users', 'statcis', 'messages', 'statics']));
    }
}
