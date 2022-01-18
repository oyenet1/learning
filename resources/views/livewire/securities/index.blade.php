<div class="col-12 p-8 bg-white">
  <div class="flex justify-between items-center mb-3 px-2">
    <button data-toggle="modal" data-target="#form" class="px-3 py-2 bg-red-600 text-white text-sm focus:outline-none rounded hover:bg-red-500">Add Security to Branch</button>
    <a href="{{ route('branches') }}" class="hover:opacity-50 text-red-600" data-toggle="tooltip" title="Go back to branch" data-placement="left">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
      </svg>
    </a>

  </div>
  <div class="flex justify-between items-center mb-3 px-2">
    <input type="text" class="px-3 py-1 border-2 transition duration-500 border-green-600 rounded-md placeholder-gray-400 text-sm" wire:model="search">
    <form action="">
      <select wire:model="perPage" id="" class="px-3 py-1 border-2 transition duration-500 border-green-600 rounded-md placeholder-gray-400 text-sm">
        <option>5</option>
        <option>10</option>
        <option>20</option>
        <option>50</option>
        <option>100</option>
      </select>
    </form>
    <!-- The Modal -->
    <div class="modal fade" id="form" wire:ignore.self>
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title text-lg font-medium">
              Add new Security Staff
            </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body ">
            <form wire:submit.prevent="save" class="w-ful row overflow-y-auto h-72 " enctype="multipart/form-data">
              <div class="p-3 w-full grid grid-cols-1 space-x-2 lg:grid-cols-2 text-gray-500  font-bold items-center align-middle">
                <div class="mb-3">
                  <label for="" class="mb-1 font-normal text-gray-600 text-sm">Passport</label>
                  <input type="file" wire:model.defer="image" class="px-2 py-1 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium " placeholder="nin">
                  @error('image')
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
                  <label for="" class="capitalize mb-1 font-normal text-gray-600 text-sm">Blood Group</label>
                  <select wire:model.defer="b_group" class="px-2 py-2 text-sm rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-semibold">
                    <option value="select">Select Blood group</option>
                    @foreach ($bloods as $blood)
                    <option value="{{ $blood }}" class="capitalize">{{ $blood }}</option>
                    @endforeach
                  </select>
                  @error('b_group')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="mb-1 font-normal text-gray-600 text-sm">Telephone</label>
                  <input type="text" wire:model.defer="phone" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium ">
                  @error('phone')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="mb-1 font-normal text-gray-600 text-sm">Email Address</label>
                  <input type="email" wire:model.defer="email" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium ">
                  @error('email')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="mb-1 font-normal text-gray-600 text-sm">Date Employed</label>
                  <input type="date" wire:model.defer="date_employed" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium ">
                  @error('date_employed')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="mb-1 font-normal text-gray-600 text-sm">Date of Birth</label>
                  <input type="date" wire:model.defer="dob" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium ">
                  @error('dob')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="mb-1 font-normal text-gray-600 text-sm">Place of Birth</label>
                  <input type="text" wire:model.defer="birth" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium ">
                  @error('birth')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="mb-1 font-normal text-gray-600 text-sm">Nationality</label>
                  <input type="text" wire:model.defer="nationality" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium ">
                  @error('nationality')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="capitalize mb-1 font-normal text-gray-600 text-sm">State of Origin</label>
                  <select wire:model.defer="sor" class="px-2 py-2 text-sm rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-semibold">
                    <option value="select">Select State</option>
                    @foreach ($state as $state)
                    <option value="{{ $state->state }}" class="capitalize">{{ $state->state }}</option>
                    @endforeach
                  </select>
                  @error('sor')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="capitalize mb-1 font-normal text-gray-600 text-sm">L.G.A.</label>
                  <input type="text" wire:model.defer="lga" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium ">
                  @error('lga')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="mb-1 font-normal text-gray-600 text-sm">Address</label>
                  <input type="text" wire:model.defer="address" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium ">
                  @error('address')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="mb-1 font-normal text-gray-600 text-sm">Religion</label>
                  <input type="text" wire:model.defer="religion" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium ">
                  @error('religion')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="mb-1 font-normal text-gray-600 text-sm">Id Card Type</label>
                  <input type="text" wire:model.defer="id_card" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium ">
                  @error('id_card')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="mb-1 font-normal text-gray-600 text-sm">Card NO</label>
                  <input type="text" wire:model.defer="card_no" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium ">
                  @error('card_no')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="mb-1 font-normal text-gray-600 text-sm">Salary</label>
                  <input type="number" wire:model.defer="salary" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium ">
                  @error('salary')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="mb-1 font-normal text-gray-600 text-sm">Height</label>
                  <input type="number" wire:model.defer="height" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium ">
                  @error('height')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="mb-1 font-normal text-gray-600 text-sm">BVN</label>
                  <input type="number" wire:model.defer="bvn" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium ">
                  @error('bvn')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="font-normal mb-1">Next of kin Name</label>
                  <input type="text" wire:model.defer="nok_name" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium " placeholder="">
                  @error('nok_name')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="font-normal mb-1">Next of kin phone</label>
                  <input type="text" wire:model.defer="nok_phone" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium " placeholder="">
                  @error('nok_phone')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="" class="font-normal mb-1">Next of kin Address</label>
                  <input type="text" wire:model.defer="nok_address" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium " placeholder="">
                  @error('nok_address')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3 my-auto align-middle text-right lg:col-span-2">
                  <button type="submit" class="rounded align-middle border-2 border-green-500 bg-green-600 hover:opacity-80 text-white py-2 text-center px-3 text-sm  font-medium">Save</button>
                </div>
              </div>
            </form>
          </div>

          {{-- <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        </div> --}}

        </div>
      </div>
    </div>
  </div>
  <table class="table-auto w-full rounded overflow-hidden shadow font-normal">
    <thead>
      <tr class=" font-normal bg-gray-50 border px- text-white text-left">
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600 w-32"></th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Details</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Role</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Salary</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Phone</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Address</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Date employed</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Action</th>
      </tr>
    </thead>

    <tbody class="font-normal">
      @foreach ($securities as $security)
      <tr class="border border-t-0 text-sm text-gray-700 font-medium">
        <td class="p-2 font-normal text-center  items-center">
          @if ($security->image)
          <img src="{{ asset('storage/' . $security->image) }}" class="mx-auto w-12 h-12 object-cover rounded-full" alt="{{ $security->name[0] }}">
      @else
      <span class="rounded-full {{ getRandomColor(['bg-blue-600', 'bg-pink-600','bg-yellow-500','bg-red-600','bg-purple-600','bg-pink-900','bg-blue-700','bg-yellow-400',]) }} shadow-inner  uppercase text-center px-3 py-2 mx-auto text-lg font-semibold">{{ $security->name[0] }}</span>
      @endif
      </td>
      <td class="p-2 font-normal flex flex-col">
        <span class="text-black font-medium">{{ $security->name }}</span>
        <span class="">{{ $security->email }}</span>
      </td>
      <td class="p-2 font-normal">Security</td>
      <td class="p-2 font-normal">
        <span class="py-1 px-2 text-white bg-green-500 text-xs rounded-lg">&#8358;{{moneyFormat($security->salary) }}</span>
      </td>
      <td class="p-2 font-normal">{{ '0'.$security->phone }}</td>
      <td class="p-2 font-normal">{{ $security->address }}</td>
      <td class="p-2 font-normal">{{ formatDate($security->date_employed) }}</td>
      <td class="p-2 font-normal space-x-2 items-center">
        <a href="{{ route('securities.show', [$branch->state, $security->name]) }}" class="text-xs text-white btn btn-sm btn-primary" data-toggle="tooltip" title="View security full details" data-placement="top">
          <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
          </svg>
        </a>
        <a class="text-xs text-white btn btn-sm btn-danger" wire:click.prevent="confirmDelete({{ $security->id }})" data-toggle="tooltip" title="Delete staff" data-placement="top">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
          </svg>
        </a>
      </td>
      </tr>
      @endforeach

    </tbody>
    @if ($securities->count() > 0)
    <tfoot class="mx-auto block text-center">

      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td class="mx-auto block w-1/2">
          <p class="my-2">{{ $securities->links() }}</p>
        </td>
      </tr>
    </tfoot>
    @endif
  </table>
</div>
