<div class="col-12 p-8 bg-white">
  <div class="flex justify-between items-center mb-3 px-2">
    <button data-toggle="modal" data-target="#form" class="px-3 py-2 bg-red-600 text-white text-sm focus:outline-none rounded hover:bg-red-500">Add payment to Branch</button>
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
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title text-lg font-medium">
              @if($update)
              Edit Payment
              @else
              Add payment
              @endif
            </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body ">
            <form wire:submit.prevent=@if($update) 'update' @else 'save' @endif class="w-ful row overflow-y-auto h-72 " enctype="multipart/form-data">
              <div class="p-3 w-full text-gray-500  font-bold items-center align-middle">
                <div class="mb-3">
                  <label for="" class="capitalize mb-1 font-normal text-gray-600 text-sm">payment Role</label>
                  <select wire:model.defer="type" class="px-2 py-2 text-sm rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-semibold">
                    <option value="select">Select Transaction Type</option>
                    @foreach ($types as $type)
                    <option value="{{ $type }}" class="capitalize">{{ $type }}</option>
                    @endforeach
                  </select>
                  @error('type')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="" class="mb-1 font-normal text-gray-600 text-sm">Amount</label>
                  <input type="number" step=".01" wire:model.defer="amount" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium ">
                  @error('amount')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="" class="mb-1 font-normal text-gray-600 text-sm">Transaction Description</label>
                  <input type="text" wire:model.defer="description" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium " placeholder="name...">
                  @error('description')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="" class="font-normal mb-1">Transaction Date</label>
                  <input type="datetime-local" wire:model.defer="date" class="p-2 rounded focus-within: focus:outline-none focus:border-green-600 w-full border-2 placeholder-gray-400 font-medium " placeholder="">
                  @error('date')
                  <span class="text-xs text-red-600 font-normal">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mb-3 my-auto align-middle text-right lg:col-span-2">
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
  <table class="table-auto w-full rounded overflow-hidden shadow font-normal">
    <thead>
      <tr class=" font-normal bg-gray-50 border px- text-white text-left">
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600"></th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Amount</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Type</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Description</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Branch</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Date</th>
        <th class="font-semibold text-sm py-2 pl-2 text-gray-600">Action</th>
      </tr>
    </thead>

    <tbody class="font-normal">
      @foreach ($payments as $payment)
      <tr class="border border-t-0 text-sm text-gray-700 font-medium capitalize">
        <td class="text-center">
            <input type="checkbox" name="" id="" class="mx-1 border-2 bg-green-600">
        </td>
        <td class="p-2 font-normal ">
          @if ($payment->type == 'credit')
          <span class="px-2 py-1 rounded bg-green-600 text-white text-xs">&#8358;{{moneyFormat($payment->amount) }}</span>
          @else
          <span class="px-2 py-1 rounded bg-red-600 text-white text-xs">&#8358;{{moneyFormat($payment->amount) }}</span>
          @endif
        </td>
        <td class="p-2 font-normal">
          {{$payment->type }}
        </td>

        <td class="p-2 font-normal">
          {{$payment->description }}
        </td>
        <td class="p-2 font-normal">
          {{$payment->branch->state }}
        </td>
        <td class="p-2 font-normal">{{ returnDateTime($payment->date) }}</td>
        <td class="p-2 font-normal  space-x-2 items-center">
          <a class="text-xs text-white btn btn-sm bg-blue-500" wire:click.prevent="edit({{ $payment->id }})" data-toggle="tooltip" title="Edit Transaction details" data-placement="top">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
              <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
              <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
            </svg>
          </a>
          <a class="text-xs text-white btn btn-sm btn-danger" wire:click.prevent="confirmDelete({{ $payment->id }})" data-toggle="tooltip" title="Delete payment" data-placement="top">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
          </a>
        </td>
      </tr>
      @endforeach

    </tbody>
    @if ($payments->count() > 0)
    <tfoot class="mx-auto block text-center">

      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td class="mx-auto block w-1/2">
          <p class="my-2">{{ $payments->links() }}</p>
        </td>
      </tr>
    </tfoot>
    @endif
  </table>
</div>
