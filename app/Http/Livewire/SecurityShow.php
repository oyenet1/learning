<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use Livewire\Component;
use App\Models\Security;
use App\Models\Guarantor;
use Livewire\WithFileUploads;

class SecurityShow extends Component
{
    use WithFileUploads;

    public Security $security;
    public Branch $Branch;

    protected $listeners = [
        'deleteConfirm' => 'delete',
    ];
// refreshinputs after saved
function refreshInputs()
{
    $this->role = '';
    $this->image = '';
    $this->name = '';
    $this->dob = '';
    $this->date_employed = '';
    $this->birth = '';
    $this->nationality = '';
    $this->sor = '';
    $this->lga = '';
    $this->bvn = '';
    $this->height = '';
    $this->b_group = '';
    $this->address = '';
    $this->religion = '';
    $this->card_no = '';
    $this->id_card = '';
    $this->phone = '';
    $this->email = '';
    $this->salary = '';
    $this->nok_phone = '';
    $this->nok_name = '';
    $this->nok_address = '';
}

    // variable for form
    public $name, $title, $phone, $image, $address, $relationship, $qualification, $from, $to;

    public $delete = null;

    public $update = false;

    protected $rules = [
        'name' => ['required', 'max:100'],
        'title' => ['required', 'notIn:select'],
        'image' => ['nullable', 'mimes:png,jpg,jpeg,gif', 'max:200'],
        'phone' => ['required', 'digits:10', 'unique:security'],
        'address' => ['required'],
        'relationship' => ['required']
    ];

    protected $messages = [
        'phone.digits' => 'Gurantor telephone must be 10digits excluding the first zero e.g 8011112222 if your number is 08011112222',
    ];

    function add()
    {
        $this->update = false;
    }

    public function save()
    {
        $data = $this->validate();

        $imagePath = $this->image->store('guarantors', 'public');
       
        if ($this->security->trustees()->count() == 2) {
            $this->dispatchBrowserEvent('closeModal');

            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'error',
                'text' => 'You cannot add more than 2 guarantor',
                'title' => 'Maximum Guarantor reach',
            ]);
        } else {
            $security = $this->security->sureties()->create(array_merge($data, ['image' => $imagePath]));

            $this->update = false;

            if ($security) {
                // $this->refreshInputs();

                $this->dispatchBrowserEvent('closeModal');

                $this->dispatchBrowserEvent('swal:success', [
                    'icon' => 'success',
                    'text' => 'Guarantor added for ' . $this->security->name,
                    'title' => 'Added',
                    'timer' => 3000,
                ]);
                return redirect()->back();
            }
        }
    }

    public function addSchool()
    {
        $data = $this->validate(
            [
                'name' => 'required',
                'qualification' => 'required',
                'from' => 'required|date|before:today',
                'to' => 'required|date|before:today',
            ],
            [
                'from.before' => 'The start cannot be future date',
                'to.before' => 'The graduation cannot be future date'
            ]
        );

        $security = $this->security->schools()->create($data);

        $this->update = false;

        if ($security) {

            $this->refreshInputs();
            $this->dispatchBrowserEvent('closeModal');

            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => 'School added for ' . $this->security->name,
                'title' => 'Added',
                'timer' => 3000,
            ]);
            return redirect()->back();
        }
    }


    public function confirmDelete($id)
    {

        $guarantor = Guarantor::findOrFail($id);

        $this->delete = $id;

        $this->dispatchBrowserEvent('swal:confirm');
    }

    public function delete()
    {

        $guarantor = Guarantor::findOrFail($this->delete);

        $true = $guarantor->delete();

        if ($true) {

            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => strtoupper($guarantor->name) . ' has removed as ' . strtoupper($this->security->name) . ' guarantor',
                'title' => 'Removed',
                'timer' => 5000,
            ]);
            return redirect()->back();
        }
        $this->update = false;
    }

    public function render()
    {
        $grades = ['Senior School Certificate', 'West African GCE "O" Level', 'Nigeria certificate Education', 'West African GCE "A" Level', 'National Diploma', 'Bachelors Degree', 'Higher National Diploma', 'Bachelor Honours Degree', 'Doctor of Veterinary Medicine', 'Postgraduate Diploma', 'Masters Degree', 'Master of Philosophy', 'Doctor of Philosophy'];
        return view('livewire.securities.show', compact(['grades']));
    }
}
