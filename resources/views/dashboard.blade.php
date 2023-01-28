@extends('_layout')

@section('content')

<div class="position-relative d-flex justify-content-center align-items-center flex-column h-100">
    {{-- Check for any session messages --}}
    @if(session('success'))

    <div class="bg-warning position-absolute bottom-0 end-0 mb-5 px-3 py-2 rounded-3">
        <h5 class="text-black">{{session('success')}}</h5>
    </div>

    @endif

    <h3>Dashboard Page</h3>

    {{-- getting auth user email --}}
    @if ( auth()->user()->email )

        <div class="px-3 py-2 rounded-1 my-2 d-flex">
            <h5>{{auth()->user()->email}}</h5>
        </div>

    @endif

    <a class="btn btn-danger" href="/signout">SIGNOUT</a>
</div>

@endsection