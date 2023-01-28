@extends('_layout')

@section('content')

<div class=" d-flex justify-content-center align-items-center flex-column h-100">

    @if(session('success'))

    <div class="bg-warning px-3 py-2 rounded-3 mb-3">
        <h5 class="text-black">{{session('success')}}</h5>
    </div>

    @endif

    <form method="POST" action="{{ config('app.url')}}/department" class="w-50">
    @csrf
    <h4 class="text-uppercase text-center">CREATE DEPARTMENT</h4>
    <div class="input-filed mt-3">
        <label class="mb-3" for="name">Name</label>
        <input class="form-control" type="text" name="name" id="name" placeholder="Deparrtment Name.." autofocus="true">

        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif

    </div>
    <div class="input-filed mt-3">
        <label class="mb-3" for="department_id">Department Code</label>
        <input class="form-control" type="text" name="department_id" id="department_id" placeholder="Department Code..">

        @if ($errors->has('department_id'))
            <span class="text-danger">{{ $errors->first('department_id') }}</span>
        @endif

    </div>
    <div class="input-filed mt-3">
        <label class="mb-3" for="status">Status</label>
        <select class="form-control" name="status" id="status" placeholder="Status..">
            <option value="ACTIVE">Active</option>
            <option value="INACTIVE">In Active</option>
        </select>

        @if ($errors->has('status'))
            <span class="text-danger">{{ $errors->first('status') }}</span>
        @endif

    </div>
    <button class="mt-4 btn btn-primary" type="submit">CREATE</button>
    </form>
</div>

@endsection
