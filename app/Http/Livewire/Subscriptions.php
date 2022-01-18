<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Newsletter;

class Subscriptions extends Component
{
   public $perPage = 10;
    
    public function render()
    {
        $newsletters = Newsletter::paginate($this->perPage);
        return view('livewire.subscriptions', compact(['newsletters']));
    }
}
