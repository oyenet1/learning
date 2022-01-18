<?php

namespace App\Http\Livewire;

use App\Models\Branch;
use App\Models\Payment as ModelPayment;
use Livewire\Component;

class Payment extends Component
{
    public $delete = null;

    public $update = false;

    public Branch $branch;

    public $type, $description, $date, $amount, $cid;
    // refreshinputs after saved
    function refreshInputs()
    {
        $this->type = '';
        $this->description = '';
        $this->date = '';
        $this->amount = '';
    }

    public $search, $perPage = 10;
    protected $paginationTheme = 'bootstrap';


    public function save()
    {
        $data = $this->validate(
            [
                'amount' => 'required|numeric|min:50|max:5800000000',
                'description' => 'required',
                'type' => 'required|not_in:select',
                'date' => 'required|date|before_or_equal:today',
            ],
            ['date.before_or_equal' => 'Transactions date must be less than or equal todays date']
        );

        $saved = $this->branch->payments()->create($data);


        if ($saved) {
            $this->refreshInputs();
            $this->dispatchBrowserEvent('closeModal');
            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => 'Transaction added for ' . strtoupper($this->branch->state) . ' branch successfully',
                'title' => 'Transaction Added',
                'timer' => 4000,
            ]);
        }
    }

    public function edit($id)
    {

        $transaction = ModelPayment::findOrFail($id);

        $this->cid = $transaction->id;
        $this->amount = $transaction->amount;
        $this->date = $transaction->date;
        $this->type = $transaction->type;
        $this->description = $transaction->description;
        $this->update = true;
        $this->dispatchBrowserEvent('showModal');
    }

    function update()
    {

        $cid = $this->cid;
        $data = $this->validate(
            [
                'amount' => 'required|numeric|min:50|max:5800000000',
                'description' => 'required',
                'type' => 'required|not_in:select',
                'date' => 'required|date|before_or_equal:today',
            ],
            ['date.before_or_equal' => 'Transactions date must be less than or equal todays date']
        );

        $true = ModelPayment::find($cid)->update($data);

        $this->update = false;
        $this->refreshInputs();
        $this->dispatchBrowserEvent('closeModal');

        if ($true) {
            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => 'Payment Updated Successfully',
                'title' => 'Updated',
                'timer' => 3000,
            ]);
        }
    }

    public function confirmDelete($id)
    {

        $Payment = ModelPayment::findOrFail($id);

        $this->delete = $id;

        $this->dispatchBrowserEvent('swal:confirm');
    }

    public function delete()
    {

        $Payment = ModelPayment::findOrFail($this->delete);

        $true = $Payment->delete();

        if ($true) {
            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => 'Transaction has deleted Successfully from ' . strtoupper($this->branch->state) . ' branch',
                'title' => 'Deleted',
                'timer' => 3000,
            ]);
        }
        $this->update = false;
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $payments = ModelPayment::with('branch')->where('type', 'LIKE', $search)->orWhere('description', 'LIKE', $search)->orWhere('amount', 'LIKE', $search)->paginate($this->perPage);
        $types = ['credit', 'debit'];
        return view('livewire.payment', compact('types', 'payments'));
    }
}
