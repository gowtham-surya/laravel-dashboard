@extends('_layout')

@section('content')

<div class="container mt-3 h-100">
    <h5>Name: {{$department->name}}</h5>
    <h5>Code: {{$department->department_id}}</h5>
    <h5>Status: {{$department->status}}</h5>

    <table class="table mt-3 table-striped">
        <thead>
            <td>Student Name</td>
            <td>Student Id</td>
            <td>Student Email</td>
            <td>Status</td>
            <td>Actions</td>
        </thead>
        <tbody>
            @foreach ($department->students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td class="inner-table">{{ $student->rollno }}</td>
                    <td class="inner-table">{{ $student->email }}</td>
                    <td class="inner-table">{{ $student->status }}</td>
                    <td class="inner-table">
                        <form method="POST" action="{{ route('students.destroy', $student->id) }}">
                            <a class="btn btn-primary" href="/students/{{$student->id}}">Show</a>
                            <a class="btn btn-warning ms-2" href="/students/{{$student->id}}/edit">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ms-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
