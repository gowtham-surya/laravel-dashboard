@extends('_layout')

@section('content')

<div class="d-flex justify-content-center align-items-center flex-column h-100">
    <form action="/register" method="post" class="w-25">
    @csrf
    <h4 class="text-uppercase text-center">Registration</h4>
    <div class="input-filed mt-3">
        <label class="mb-3" for="name">Name</label>
        <input class="form-control" type="text" name="name" id="name" placeholder="Enter name.." autofocus="true">

        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif

    </div>
    <div class="input-filed mt-3">
        <label class="mb-3" for="email">Email</label>
        <input class="form-control" type="email" name="email" id="email" placeholder="Enter Email..">

        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif

    </div>
    <div class="input-filed mt-3">
        <label class="mb-3" for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password" placeholder="Enter Password..">

        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif

    </div>
    <button class="mt-4 btn btn-primary" type="submit">REGISTER</button>
    </form>
</div>

@endsection