@extends('_layout')

@section('content')

<div class=" d-flex justify-content-center align-items-center flex-column h-100">

    @if(session('success'))

    <div class="bg-warning px-3 py-2 rounded-3 mb-3">
        <h5 class="text-black">{{session('success')}}</h5>
    </div>

    @endif

    <form method="POST" action="{{ route('students.update',$data->id) }}" class="w-50">
    @csrf
    @method('PUT')
    <h4 class="text-uppercase text-center">EDIT STUDENT</h4>
    <div class="input-filed mt-3">
        <label class="mb-3" for="name">Name</label>
        <input class="form-control" type="text" name="name" id="name" placeholder="Student Name.." autofocus="true" value="{{$data->name}}">

        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif

    </div>
    <div class="input-filed mt-3">
        <label class="mb-3" for="rollno">Roll No</label>
        <input class="form-control" type="text" name="rollno" id="rollno" placeholder="Roll no.." value="{{$data->rollno}}">

        @if ($errors->has('rollno'))
            <span class="text-danger">{{ $errors->first('rollno') }}</span>
        @endif

    </div>
    <div class="input-filed mt-3">
        <label class="mb-3" for="email">Email</label>
        <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="{{$data->email}}">

        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif

    </div>
    <div class="input-filed mt-3">
        <label class="mb-3" for="department_id">Department</label>
        <select class="form-control" name="department_id" id="department_id"   required>

            @foreach ($departments as $department)

                @if ($department->id == $data->department_id)
                    <option value={{$department->id}} selected>{{$department->name}}</option>
                @else
                    <option value={{$department->id}}>{{$department->name}}</option>
                @endif
            @endforeach

        </select>



        @if ($errors->has('department_id'))
            <span class="text-danger">{{ $errors->first('department_id') }}</span>
        @endif

    </div>
    <div class="input-filed mt-3">
        <label class="mb-3" for="status">Status</label>
        <input class="form-control" type="text" name="status" id="status" placeholder="Status.." value="{{$data->status}}">

        @if ($errors->has('status'))
            <span class="text-danger">{{ $errors->first('status') }}</span>
        @endif

    </div>
    <button class="mt-4 btn btn-primary" type="submit">EDIT</button>
    </form>
</div>

@endsection
