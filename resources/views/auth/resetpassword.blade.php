@extends('_layout')

@section('content')

<div class=" d-flex justify-content-center align-items-center flex-column h-100">

    @if(session('success'))

    <div class="bg-warning px-3 py-2 rounded-3 mb-3">
        <h5 class="text-black">{{session('success')}}</h5>
    </div>

    @endif

    <form action="/reset-password" method="post" class="w-25">
    @csrf
    <h4 class="text-uppercase text-center">Reset Password</h4>
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="input-filed mt-3">
        <label class="mb-3" for="email">Email</label>
        <input class="form-control" type="email" name="email" id="email" placeholder="Enter Email.." autofocus="true">

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
    <div class="input-filed mt-3">
        <label class="mb-3" for="confirmPassword">Confirm Password</label>
        <input class="form-control" type="password" name="password_confirmation" id="password" placeholder="Confirm Password..">

        @if ($errors->has('password_confirmation'))
            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
        @endif

    </div>
    <button class="mt-4 btn btn-primary" type="submit">RESET PASSWORD</button>
    </form>
</div>

@endsection
