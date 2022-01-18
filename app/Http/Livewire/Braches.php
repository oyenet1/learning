<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use Livewire\Component;
use Livewire\WithPagination;

class Braches extends Component
{
    use WithPagination;

    public $delete = null;

    public $update = false;
    public $address, $state, $cid, $search, $opened_at;
    public $perPage = 5;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'deleteConfirm' => 'delete',
    ];

    public $branches = [
        "Abia",
        "Adamawa",
        "Akwa Ibom",
        "Anambra",
        "Bauchi",
        "Bayelsa",
        "Benue",
        "Borno",
        "Cross River",
        "Delta",
        "Ebonyi",
        "Edo",
        "Ekiti",
        "Enugu",
        "FCT - Abuja",
        "Gombe",
        "Imo",
        "Jigawa",
        "Kaduna",
        "Kano",
        "Katsina",
        "Kebbi",
        "Kogi",
        "Kwara",
        "Lagos",
        "Nasarawa",
        "Niger",
        "Ogun",
        "Ondo",
        "Osun",
        "Oyo",
        "Plateau",
        "Rivers",
        "Sokoto",
        "Taraba",
        "Yobe",
        "Zamfara"
    ];

    // refreshinputs after saved
    function refreshInputs()
    {
        $this->state = '';
        $this->address = '';
        $this->opened_at = '';
    }

    protected $rules = [
        'state' => ['required', 'unique:branches'],
        'address' => ['required'],
        'opened_at' => ['required', 'date', 'before_or_equal:today'],
    ];

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }

    public function save()
    {
        $data = $this->validate();
        $saved = Branch::create($data);

        if ($saved) {

            $this->refreshInputs();
            $this->dispatchBrowserEvent('closeModal');
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

        $branch = Branch::findOrFail($id);

        //     dd($branch);
        //     $this->dispatchBrowserEvent('swal:confirm', [
        //         'icon' => 'warning',
        //         'text' => 'This action cannot be reversed',
        //         'title' => 'Are you sure?',
        //     ]);
        // }

        $this->cid = $branch->id;
        $this->state = $branch->state;
        $this->address = $branch->address;
        $this->opened_at = $branch->opened_at;
        $this->update = true;
        $this->dispatchBrowserEvent('showModal');
    }

    function update()
    {

        $cid = $this->cid;
        $branch = $this->validate(
            [
                'state' => 'required|unique:branches,state,' . $cid,
                'address' => ['required'],
                'opened_at' => ['required', 'date', 'before_or_equal:today'],
            ],
            ['opened_at.before_or_equal' => 'The opening date of the branch must be less than today']
        );
        $true = Branch::find($cid)->update($branch);

        $this->update = false;
        $this->refreshInputs();
        $this->dispatchBrowserEvent('closeModal');

        if ($true) {
            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => 'Branch Updated Successfully',
                'title' => 'Updated',
                'timer' => 2000,
            ]);
        }
    }
    public function confirmDelete($id)
    {

        $branch = Branch::findOrFail($id);

        $this->delete = $id;

        $this->dispatchBrowserEvent('swal:confirm');
    }

    public function delete()
    {
        $branch = Branch::findOrFail($this->delete);
        $true = $branch->delete();

        if ($true) {
            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => 'Branch deleted Successfully',
                'title' => 'Deleted',
                'timer' => 2000,
            ]);
        }
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $states = Branch::where('user_id', '!=', 1)->where('state', 'LIKE', $search)->paginate($this->perPage);
        // $states = Branch::where('user_id', auth()->user()->id)->where('state', 'LIKE', $search)->paginate($this->perPage);
        return view('livewire.braches', compact(['states']));
    }
}
