<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class Messages extends Component
{

    use WithPagination;

    public $perPage = 10;
    public $search;

    // read
    public function read($id)
    {
        $data = Contact::find($id);
        $data['hasRead'] = true;
        $true = $data->update();

        if ($true) {
            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => 'Message has been read',
                'title' => 'Read',
                'timer' => 3000,
            ]);
        }
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $messages = Contact::where('subject', 'LIKE', $search)->orWhere('name', 'LIKE', $search)->orWhere('email', 'LIKE', $search)->orderBy('hasRead', 'asc')->paginate($this->perPage);
        return view('livewire.messages', compact('messages'));
    }
}
