@extends('_layout')

@section('content')

<div class="container mt-3 h-100">
    <div class="top-bar d-flex align-items-center justify-content-between w-100">
        <h4>LIST OF AVAILABLE STUDENTS</h4>
        <form id="export" action="/student-export" method="GET">
            @csrf
            <input type="hidden" name="student_ids" id="student_ids" value=""/>
            <button form="export" type="submit" id="export-rows"  class="btn btn-primary">Export</button>
            <a href="/students/create" class="btn btn-primary">CREATE</a>
        </form>
    </div>
    <table class="table mt-3 table-striped">
        <thead>
            <th>
                <input type="checkbox" class="form-check-input" id="select-all-checkbox">
            </th>
            <th>Student Name</th>
            <th>Student Id</th>
            <th>Student Email</th>
            <th>Department</th>
            <th>Status</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>
                        <input type="checkbox" class="form-check-input" id="select-checkbox" data-id="{{ $student->id }}">
                    </td>
                    <td>{{ $student->name }}</td>
                    <td class="inner-table">{{ $student->rollno }}</td>
                    <td class="inner-table">{{ $student->email }}</td>
                    <td class="inner-table">{{ $student->department->name }}</td>
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

<script>

    var check = document.getElementById('select-all-checkbox');

    check.addEventListener('change', ()=>{
        if (check.checked) {
            document.querySelectorAll('#select-checkbox').forEach((checkbox)=>{
                checkbox.checked = true;
            })
        }else{
            document.querySelectorAll('#select-checkbox').forEach((checkbox)=>{
                checkbox.checked = false;
            })
        }
    })

    document.querySelector("form#export").addEventListener("submit", function(event) {
        event.preventDefault();

        var ids = [];
        var checkboxes = document.querySelectorAll("#select-checkbox:checked");

        for (var i = 0; i < checkboxes.length; i++) {
            ids.push(checkboxes[i].getAttribute("data-id"));
        }

        document.getElementById("student_ids").value = ids.join(",");
        this.submit();
    });

</script>

@endsection
