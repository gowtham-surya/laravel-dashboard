@extends('_layout')

@section('content')

<div class="d-flex justify-content-center align-items-center flex-column h-100">
    <ul class="text-center">
        <h3>{{$student->name}}</h3>
        <h4>{{$student->rollno}}</h4>
        <h5>{{$student->email}}</h5>
        <h5>{{$student->department->name}}</h5>
        <h5>{{$student->status}}</h5>
    </ul>
</div>

@endsection
