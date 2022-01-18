<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Branch;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Manager extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $delete = null;

    public $update = false;
    public $name, $phone, $email, $nin, $image, $address, $state, $cid, $search;
    public $perPage = 10;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'deleteConfirm' => 'delete',
    ];

    // refreshinputs after saved
    function refreshInputs()
    {
        $this->state = '';
        $this->nin = '';
        $this->name = '';
        $this->phone = '';
    }

    function add()
    {
        $this->update = false;
    }

    protected $rules = [
        'name' => ['required', 'max:100'],
        'state' => ['required'],
        'image' => ['nullable', 'mimes:png,jpg,jpeg,gif', 'max:200'],
        'nin' => ['required', 'digits:11', 'unique:users'],
        'phone' => ['required', 'digits:10', 'unique:users'],
    ];

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }

    public function save()
    {
        $data = $this->validate();

        $data['email'] = strtolower($this->state) . '@alansarsecurity.com';
        $data['password'] = Hash::make('password');

        $imagePath = $this->image->store('staffs', 'public');
        // $data['image'] = $imagePath;
        $saved = User::create(array_merge($data, ['image' => $imagePath]));

        $branch = Branch::where('state', $data['state'])->update(['user_id' => $saved->id]);
        $this->update = false;

        if ($saved && $branch) {
            
            $this->dispatchBrowserEvent('closeModal');
            $this->refreshInputs();
            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => 'Branch Opened Successfully',
                'title' => 'Created',
                'timer' => 3000,
            ]);
        }
    }

    public function edit($id)
    {

        $head = User::findOrFail($id);

        $this->cid = $head->id;
        $this->state = $head->branch->state;
        $this->nin = $head->nin;
        $this->name = $head->name;
        $this->phone = $head->phone;
        $this->update = true;
        $this->dispatchBrowserEvent('showModal');
    }

    function update()
    {
        $this->update = true;
        $cid = $this->cid;
        $data = $this->validate([
            'name' => ['required', 'max:100'],
            'state' => ['nullable'],
            'nin' => ['required', 'digits:11', 'unique:users,nin,' . $cid],
            'phone' => ['required', 'digits:10'],
        ]);

        // $imagePath = $this->image->store('staffs','public');
        // $data['image'] = $imagePath;

        // $true = User::find($cid)->update(array_merge($data, ['image' => $imagePath]));
        $true = User::find($cid)->update($data);

        $branch = Branch::where('user_id', $cid)->update(['user_id' => $cid]);

        $this->update = false;
        $this->refreshInputs();
        $this->dispatchBrowserEvent('closeModal');

        if ($true) {
            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => 'Branch Admin Updated Successfully',
                'title' => 'Updated',
                'timer' => 2000,
            ]);
        }
    }

    public function confirmDelete($id)
    {

        $branch = User::findOrFail($id);

        $this->delete = $id;

        $this->dispatchBrowserEvent('swal:confirm');
    }

    public function delete()
    {

        $branch = User::findOrFail($this->delete);


        if ($this->delete == 1) {
            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'error',
                'text' => 'You cannot delete the superadministrator',
                'title' => 'Action Denied',
            ]);
        } else { //give error message it the admin is present
            $true = $branch->delete();

            if ($true) {
                $this->dispatchBrowserEvent('swal:success', [
                    'icon' => 'success',
                    'text' => 'Branch admin deleted Successfully',
                    'title' => 'Deleted',
                    'timer' => 2000,
                ]);
            }
        }
        $this->update = false;
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $states = Branch::where('user_id', null)->get();
        $managers = User::where('id', '!=', 1)->where('name', 'LIKE', $search)->paginate($this->perPage);
        return view('livewire.manager', compact(['managers', 'states']));
    }
}
