<?php

namespace App\Http\Livewire;

use App\Models\Staff;
use App\Models\Branch;
use Livewire\Component;
use App\Models\Guarantor;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class StaffShow extends Component
{
    use WithFileUploads;

    public Staff $staff;
    public Branch $Branch;

    protected $listeners = [
        'deleteConfirm' => 'delete',
    ];

    // variable for form
    public $name, $title, $phone, $image, $address, $relationship;

    public $delete = null;

    public $update = false;

    protected $rules = [
        'name' => ['required', 'max:100'],
        'title' => ['required', 'notIn:select'],
        'image' => ['nullable', 'mimes:png,jpg,jpeg,gif', 'max:200'],
        'phone' => ['required', 'digits:10', 'unique:staff'],
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
        // dd($this->staff->guarantors()->count());
        if ($this->staff->guarantors()->count() == 2) {
            $this->dispatchBrowserEvent('closeModal');

            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'error',
                'text' => 'You cannot add more than 2 guarantor',
                'title' => 'Maximum Guarantor reach',
            ]);
        } else {
            $staff = $this->staff->guarantors()->create(array_merge($data, ['image' => $imagePath]));

            $this->update = false;

            if ($staff) {
                // $this->refreshInputs();
                
                $this->dispatchBrowserEvent('closeModal');
               
                $this->dispatchBrowserEvent('swal:success', [
                    'icon' => 'success',
                    'text' => 'Guarantor added for ' . $this->staff->name,
                    'title' => 'Added',
                    'timer' => 3000,
                ]);
                return redirect()->back();
            }
            
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
                'text' => strtoupper($guarantor->name).' has removed as '. strtoupper($this->staff->name). ' guarantor',
                'title' => 'Removed',
                'timer' => 5000,
            ]);
            return redirect()->back();
        }
        $this->update = false;
    }



    public function render()
    {
        return view('livewire.staffs.show');
    }
}
