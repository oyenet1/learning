<div class="col-12 p-3">
  <div class="w-full  rounded overflow-hidden mx-auto">
    <h4 class="text-gray-500 font-medium text-2xl">Staff Overview</h4>
    <hr class="w-full my-3">
    <div class="w-full rounded-md overflow-hidden bg-white">
      <div class="w-full bg-cover bg-center h-32 z-20" style="background: url('/img/security2.jpg')">
      </div>
      <div class="-mt-8 z-20">
        <img src="{{ asset('storage/' . $staff->image) }}" alt="{{ $staff->name }}" class="float-left object-center rounded-full h-24 w-24 lg:h-32 lg:w-32 mx-3 lg:mx-4 shadow-md border-green-100">
        <p class="float-left mt-4 pt-4">
          <span class=" text-xl lg:text-2xl font-medium capitalize">{{ $staff->name }}</span> <br>
          <span class="font-medium text-gray-500 italic">{{ '@'.$staff->role }}</span>
        </p>

        <button data-toggle="modal" data-target="#form" wire:click="add()" class="border-2 mt-14 border-red-500 text-red-600 px-3 py-2 rounded float-right hover:bg-red-600 hover:text-white mx-4">Add Guarantor</button>
      </div>
    </div>
    <div class="py-2 bg-white">
      <hr class="w-full m-4">
    </div>
  </div>
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-8 my-4 mx-auto">
    <div class="rounded-md p-4 bg-white shadow space-y-3">
      <h1 class="text-gray-600 text-lg font-medium  mb-2">About {{ $staff->name }}</h1>
      <div class="grid md:grid-cols-2 space-y-3">
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">Role</h1>
          <p class="font-medium text-gray-400 capitalize">{{ $staff->role }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">Email</h1>
          <p class="font-medium text-gray-400 capitalize">{{ $staff->email }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">Telephone</h1>
          <p class="font-medium text-gray-400 capitalize">{{ '0'.$staff->phone }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">Date of Birth</h1>
          <p class="font-medium text-gray-400 capitalize">{{ formatDate($staff->dob) }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">Nationality</h1>
          <p class="font-medium text-gray-400 capitalize">{{ $staff->nationality }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">state of origin</h1>
          <p class="font-medium text-gray-400 capitalize">{{ $staff->sor }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">l.g.a</h1>
          <p class="font-medium text-gray-400 capitalize">{{ $staff->lga }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">Address</h1>
          <p class="font-medium text-gray-400 capitalize">{{ $staff->address }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">religion</h1>
          <p class="font-medium text-gray-400 capitalize">{{ $staff->religion }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">Identification</h1>
          <p class="font-medium text-gray-400 capitalize">{{ $staff->id_card }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">ID no</h1>
          <p class="font-medium text-gray-400 capitalize">{{ $staff->card_no }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">salary</h1>
          <p class="font-medium text-gray-400 capitalize"><span class="py-1 px-2 text-white bg-green-500 text-xs rounded-lg">&#8358;{{moneyFormat($staff->salary) }}</span></p>
        </div>
      </div>
    </div>
    <div class="rounded-md p-4 bg-white shadow w-full">
      <h1 class="text-gray-600 text-lg font-medium  mb-2 capitalize ">Next of Kin</h1>
      <div class="grid grid-cols-1 space-y-3">
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">Branch</h1>
          <p class="font-medium text-gray-400 capitalize">{{ $staff->branch->state }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">Date of Employment</h1>
          <p class="font-medium text-gray-400 capitalize">{{ $staff->date_employed }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">Next of Name</h1>
          <p class="font-medium text-gray-400 capitalize">{{ $staff->nok_name }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">Next of Phone</h1>
          <p class="font-medium text-gray-400 capitalize">{{ '0'.$staff->nok_phone }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">Next of address</h1>
          <p class="font-medium text-gray-400 capitalize">{{ $staff->nok_address }}</p>
        </div>
      </div>
    </div>
  </div>

  {{-- guarantors --}}
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-8 my-4 mx-auto">
    @forelse ($staff->guarantors as $guarantor)
    <div class="rounded-md p-4 bg-white shadow space-y-3">
      <div class="flex justify-between mb-2 items-center bg-green-200 p-2 rounded">
        <p class="text-gray-600 text-lg font-medium">About Guarantor <span class="py-1 px-2 bg-green-500 text-white rounded text-xs"> {{ $loop->iteration }}</span></p>
        <button wire:click="confirmDelete({{ $guarantor->id }})" class="p-1 btn btn-danger text-xs">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
          </svg>
        </button>
      </div>
      <div class="grid grid-cols-1 space-y-3 relative">
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">Name</h1>
          <p class="font-medium text-gray-400 capitalize">{{ $guarantor->title .' '.$guarantor->name }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">Relationship</h1>
          <p class="font-medium text-gray-400 capitalize">{{ $guarantor->relationship }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">Name</h1>
          <p class="font-medium text-gray-400 capitalize">{{ $guarantor->name }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">Phone</h1>
          <p class="font-medium text-gray-400 capitalize">{{ '0'.$guarantor->phone }}</p>
        </div>
        <div class="w-full">
          <h1 class="uppercase text-gray-500 text-md font-medium">address</h1>
          <p class="font-medium text-gray-400 capitalize">{{ $guarantor->address }}</p>
        </div>
        <img src="{{ asset('storage/'. $guarantor->image) }}" alt="{{ $guarantor->name }}" class="absolute right-0 mb-auto h-40 lg:h-48 w-40 lg:w-48 object-cover border-8 overflow-hidden rounded-md shadow-inner">
      </div>

    </div>

    @empty
    <h1 class="font-medium text-warning text-2xl">No Guarantor Yet, Kindly add guarantor for staff</h1>
    @endforelse
  </div>

  <!-- The Modal -->
  <div class="modal fade" id="form" wire:ignore.self>
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-lg font-medium">
            @if ($update)
            Edit Guarantor's details
            @else
            Add new Guarantor for <span class="bg-red-500 text-white px-2 py-1 rounded font-normal">{{ $staff->name }}</span>
            @endif
          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form wire:submit.prevent=@if($update) 'update' @else 'save' @endif class="w-ful row" enctype="multipart/form-data">
            <div class="p-3 w-full text-gray-500  font-bold items-center align-middle">
              <div class="mb-3">
                <label for="" class="capitalize mb-1 font-normal text-gray-600 text-sm">Title</label>
                <select wire:model.defer="title" class="px-2 py-2 text-sm rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-semibold">
                  <option value="select">Select title</option>
                  <option value="mr" class="capitalize">mr</option>
                  <option value="miss" class="capitalize">miss</option>
                  <option value="mrs" class="capitalize">mrs</option>

                </select>
                @error('title')
                <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="" class="mb-1 font-normal text-gray-600 text-sm">Name</label>
                <input type="text" wire:model.defer="name" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium " placeholder="name...">
                @error('name')
                <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="" class="mb-1 font-normal text-gray-600 text-sm">Phone</label>
                <input type="text" wire:model.defer="phone" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium " placeholder="telephone">
                @error('phone')
                <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="" class="mb-1 font-normal text-gray-600 text-sm">Address</label>
                <input type="text" wire:model.defer="address" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium " placeholder="telephone">
                @error('address')
                <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="" class="mb-1 font-normal text-gray-600 text-sm">Passport</label>
                <input type="file" wire:model.defer="image" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium ">
                @error('image')
                <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="" class="font-normal mb-1">Relationship with Staff</label>
                <input type="text" wire:model.defer="relationship" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium " placeholder="">
                @error('relationship')
                <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3 my-auto align-middle text-right">
                @if($update)
                <button type="submit" class="rounded align-middle border-2 border-green-500 bg-green-600 hover:opacity-80 text-white py-2 text-center px-3 text-sm  font-medium">Update</button>
                @else
                <button type="submit" class="rounded align-middle border-2 border-green-500 bg-green-600 hover:opacity-80 text-white py-2 text-center px-3 text-sm  font-medium">Save</button>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
