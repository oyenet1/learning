<div class="col-12 p-8 bg-white">
  <div class="bg-green-500 rounded overflow-hidden mb-2 w-100 text-center text-white flex items-center mx-2">
    <a href="{{ route('head.branch') }}" class="py-1 px-2 bg-red-500 text-xs font-medium hover:text-black">Add Branch</a>
    <marquee direction="right" class="p-1 bg-black h-full">Create a Head Branch to see branch list</marquee>
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
  <h1 class="text-xl xl:text-2xl mb-3 font-medium text-black">Branches</h1>

  {{-- modal --}}
  <!-- The Modal -->
  <div class="modal fade" id="form" wire:ignore.self>
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-lg font-medium">
            @if ($update)
            Edit Branch details
            @else
            Add new Branch
            @endif
          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form wire:submit.prevent=@if($update) 'update' @else 'save' @endif class="w-ful row">
            <div class="p-3 w-full text-gray-500  font-bold items-center align-middle">
              @if (!$update)
              <div class="mb-3">
                <select wire:model.defer="state" class="px-2 py-2 text-sm rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-semibold">
                  <option value="select">Select state</option>
                  @foreach ($branches as $state)
                  <option value="{{ $state }}" class="capitalize">{{ $state }}</option>
                  @endforeach
                </select>
                @error('state')
                <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                @enderror
              </div>
              @endif
              <div class="mb-3">
                <input type="text" wire:model.defer="address" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium " placeholder="the branch location here">
                @error('address')
                <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="" class="font-normal mb-1">Date opened</label>
                <input type="date" wire:model.defer="opened_at" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium " placeholder="the branch location here">
                @error('opened_at')
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

  {{-- tables --}}
  <table class="table-auto w-full rounded overflow-hidden shadow font-normal">
    <thead>
      <tr class=" font-normal bg-gray-50 border px- text-white text-left">
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">State</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Head Admin</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Address</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Total Staff</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Total securities</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Opened_at</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Action</th>
      </tr>
    </thead>

    <tbody class="font-normal">
      @foreach ($states as $branch)
      <tr class="border border-t-0 text-sm text-gray-700 font-medium capitalize">
        <td class="p-2 font-normal flex space-x-1 items-center">
          {{ $branch->state }}
        </td>
        <td class="p-2 font-normal">{{ $branch->user->name ?? 'No Branch Head' }}</td>
        <td class="p-2 font-normal">{{ $branch->address }}</td>
        <td class="p-2 font-normal">{{ $branch->staffs->count() > 0 ? $branch->staffs->count() + 1: '1' }}</td>
        <td class="p-2 font-normal">{{ $branch->securities->count() > 0 ? $branch->securities->count() : '0' }}</td>
        <td class="p-2 font-normal">
          {{ formatDate($branch->opened_at) }}
        </td>
        <td class="p-2 font-normal space-x-2 ">
          <a class="text-xs text-white btn btn-sm bg-blue-500" wire:click.prevent="edit({{ $branch->id }})" data-toggle="tooltip" title="Edit Branch details" data-placement="top">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
              <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
              <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
            </svg>
          </a>
          {{-- <a href="{{ route('staffs.index', [$branch->state]) }}" class="text-xs text-white btn btn-sm btn-warning" data-toggle="tooltip" title="Add Staff to branch" data-placement="top">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
          </svg>
          </a>
          <a class="text-xs text-white btn btn-sm bg-red-500" href="{{ route('securities.index', [$branch->state]) }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-toggle="tooltip" title="Add Security to branch" data-placement="top">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
            </svg>
          </a> --}}
          {{-- <a class="text-xs text-white btn btn-sm bg-green-500 flex flex-row items-center" href="/branch/{{ $branch->state }}/staffs/">
            <span class="">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
              </svg>
            </span>
            <span class="w-18 ">Staffs</span>
          </a> --}}
        </td>
      </tr>
      @endforeach

    </tbody>
    @if ($states->count() > 0)
    <tfoot class="mx-auto block text-center">

      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td class="mx-auto block w-1/2">
          <p class="my-2">{{ $states->links() }}</p>
        </td>
      </tr>
    </tfoot>
    @endif
  </table>
</div>
