<div class="col-12 p-8 bg-white">
  <div class="flex justify-between items-center mb-3 px-2">
    <button data-toggle="modal" data-target="#form" wire:click="add()" class="px-3 py-2 bg-red-600 text-white text-sm focus:outline-none rounded hover:bg-red-500">Add Branch Manager</button>
    <form class="invissible invisible">
      <select wire:model="perPage" id="" class="px-3 py-1 border-2 transition duration-500 border-green-600 rounded-md placeholder-gray-400 text-sm">

      </select>
    </form>
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
  </div>

  {{-- modal --}}
  <!-- The Modal -->
  <div class="modal fade" id="form" wire:ignore.self>
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-lg font-medium">
            @if ($update)
            Edit Branch Manager details
            @else
            Add new Branch Manager
            @endif
          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form wire:submit.prevent=@if($update) 'update' @else 'save' @endif class="w-ful row" enctype="multipart/form-data">
            <div class="p-3 w-full text-gray-500  font-bold items-center align-middle">
              @if (!$update)
              <div class="mb-3">
                <label for="" class="capitalize mb-1 font-normal text-gray-600 text-sm">State assign to</label>
                <select wire:model.defer="state" class="px-2 py-2 text-sm rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-semibold">
                  <option value="select">Select state</option>
                  @foreach ($states as $state)
                  <option value="{{ $state->state }}" class="capitalize">{{ $state->state }}</option>
                  @endforeach
                </select>
                @error('state')
                <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                @enderror
              </div>
              @endif
              <div class="mb-3">
                <label for="" class="mb-1 font-normal text-gray-600 text-sm">NIN</label>
                <input type="number" wire:model.defer="nin" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium " placeholder="nin">
                @error('nin')
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
                <label for="" class="mb-1 font-normal text-gray-600 text-sm">Telephone</label>
                <input type="number" wire:model.defer="phone" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium " placeholder="telephone">
                @error('phone')
                <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                @enderror
              </div>
              @if (!$update)
              <div class="mb-3">
                <label for="" class="mb-1 font-normal text-gray-600 text-sm">Passport</label>
                <input type="file" wire:model.defer="image" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium ">
                @error('image')
                <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                @enderror
              </div>
              @endif
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

        {{-- <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
        </div> --}}

      </div>
    </div>
  </div>

  {{-- tables --}}
  <table class="table-auto w-full rounded overflow-hidden shadow font-normal">
    <thead>
      <tr class=" font-normal bg-gray-50 border px- text-white text-left">
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600 w-32"></th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Details</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Phone</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Branch Held</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Date employed</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">NIN</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Action</th>
      </tr>
    </thead>

    <tbody class="font-normal">
      @foreach ($managers as $manager)
      <tr class="border border-t-0 text-sm text-gray-700 font-medium">
        <td class="p-2 font-normal text-center  items-center">
          @if ($manager->image)
          <img src="{{ asset('storage/' . $manager->image) }}" class="mx-auto object-cover w-12 h-12 rounded-full" alt="{{ $manager->name[0] }}">
          @else
          <span class="rounded-full {{ getRandomColor(['bg-blue-600', 'bg-pink-600','bg-yellow-500','bg-red-600','bg-purple-600','bg-pink-900','bg-blue-700','bg-yellow-400',]) }} shadow-inner  uppercase text-center px-3 py-2 mx-auto text-lg font-semibold">{{ $manager->name[0] }}</span>
          @endif
        </td>
        <td class="p-2 font-normal flex flex-col">
          <span class="text-black font-medium">{{ $manager->name }}</span>
          <span class="">{{ $manager->email }}</span>
        </td>
        <td class="p-2 font-normal">{{ '0'.$manager->phone ?? 'no phone yet' }}</td>
        <td class="p-2 font-normal capitalize">{{ $manager->branch->state ?? 'Branch not assigned yet' }}</td>
        <td class="p-2 font-normal">{{ formatDate($manager->created_at) }}</td>
        <td class="p-2 font-normal">
          {{ $manager->nin }}
        </td>
        <td class="p-2 font-normal align-middle ">
          <a class="text-xs text-white btn btn-sm btn-primary" wire:click.prevent="edit({{ $manager->id }})">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
              <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
              <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
            </svg>
          </a>
          <a class="text-xs text-white btn btn-sm btn-danger" wire:click.prevent="confirmDelete({{ $manager->id }})">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
          </a>
        </td>
      </tr>
      @endforeach

    </tbody>
    @if ($managers->count() > 0)
    <tfoot class="mx-auto block text-center">

      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td class="mx-auto block w-1/2">
          <p class="my-2">{{ $managers->links() }}</p>
        </td>
      </tr>
    </tfoot>
    @endif
  </table>
</div>
