@extends('layouts.error')

@section('title', __('403: Forbidden'))

@section('content')
<div class="flex flex-col justify-center ">
  <img src="/img/403-E.svg" alt="" class=" object-cover mx-auto w-96 md:w-1/3 lg:w-1/4 xl:w-1/5 2xl:w-2/6  max-w-xs max-h-auto ">
  <h1 class="text-white font-extrabold text-3xl">The page you are visiting is forbidden, Only admin is allow</h1>
  <a href="{{ route('profile')}}" class="my-4 hover:bg-green-600 bg-red-600 rounded-md border-red-600 text-white border-2 px-4 py-2 text-center w-48 mx-auto">Go Back Home</a>
</div>
@endsection
