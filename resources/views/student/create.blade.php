@extends('_layout')

@section('content')

<div class=" d-flex justify-content-center align-items-center flex-column h-100">

    @if(session('success'))

    <div class="bg-warning px-3 py-2 rounded-3 mb-3">
        <h5 class="text-black">{{session('success')}}</h5>
    </div>

    @endif

    <form method="POST" action="{{ config('app.url')}}/students" class="w-50">
    @csrf
    <h4 class="text-uppercase text-center">CREATE STUDENT</h4>
    <div class="input-filed mt-3">
        <label class="mb-3" for="name">Name</label>
        <input class="form-control" type="text" name="name" id="name" placeholder="Student Name.." autofocus="true">

        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif

    </div>
    <div class="input-filed mt-3">
        <label class="mb-3" for="rollno">Roll No</label>
        <input class="form-control" type="text" name="rollno" id="rollno" placeholder="Roll no..">

        @if ($errors->has('rollno'))
            <span class="text-danger">{{ $errors->first('rollno') }}</span>
        @endif

    </div>
    <div class="input-filed mt-3">
        <label class="mb-3" for="email">Email</label>
        <input class="form-control" type="email" name="email" id="email" placeholder="Email">

        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif

    </div>
    <div class="input-filed mt-3">
        <label class="mb-3" for="department_id">Department</label>
        <select class="form-control" name="department_id" id="department_id" required>

            @foreach ($departments as $department)
                <option value={{$department->id}}>{{$department->name}}</option>
            @endforeach

        </select>



        @if ($errors->has('department_id'))
            <span class="text-danger">{{ $errors->first('department_id') }}</span>
        @endif

    </div>
    <div class="input-filed mt-3">
        <label class="mb-3" for="status">Status</label>
        <input class="form-control" type="text" name="status" id="status" placeholder="Status..">

        @if ($errors->has('status'))
            <span class="text-danger">{{ $errors->first('status') }}</span>
        @endif

    </div>
    <button class="mt-4 btn btn-primary" type="submit">CREATE</button>
    </form>
</div>

@endsection
