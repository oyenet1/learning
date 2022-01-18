<div class="row">
  <div class="col-sm-8 col-md-6 col-lg-3">
    <div class="card support-bar overflow-hidden">
      <div class="card-body pb-0">
        <h2 class="m-0 text-xl font-mono text-danger font-semibold">{{ $branches->count() }}</h2>
        <span class="text-c-blue font-medium">Active Branch Manager</span>
        <p class="mb-3 mt-3"></p>
      </div>
      <div class="card-footer bg-pink-600 text-white">
        <div class="row text-center">

        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-8 col-md-6 col-lg-3">
    <div class="card support-bar overflow-hidden">
      <div class="card-body pb-0">
        <h2 class="m-0 text-xl font-mono font-semibold text-blue-500">{{ $staffs->count() }}</h2>
        <span class="text-c-green font-medium">Total Staffs</span>
        <p class="mb-3 mt-3"></p>
      </div>
      <div class="card-footer bg-blue-500 text-white">
        <div class="row text-center">

        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-8 col-md-6 col-lg-3">
    <div class="card support-bar overflow-hidden">
      <div class="card-body pb-0">
        <h2 class="m-0 text-xl font-mono font-semibold text-warning">{{ $securities->count() }}</h2>
        <span class="text-c-green font-medium">Total Securities</span>
        <p class="mb-3 mt-3"></p>
      </div>
      <div class="card-footer bg-yellow-400 text-white">
        <div class="row text-center">

        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-8 col-md-6 col-lg-3">
    <div class="card support-bar overflow-hidden">
      <div class="card-body pb-0">
        <h2 class="m-0 text-xl font-mono font-semibold text-green-500">&#8358;{{moneyFormat($payments) }}</h2>
        <span class="text-c-green font-medium">Total Transactions</span>
        <p class="mb-3 mt-3"></p>
      </div>
      <div class="card-footer bg-green-500 text-white">
        <div class="row text-center">

        </div>
      </div>
    </div>
  </div>
</div>
