@extends('_layout')

@section('content')

<div class="container mt-3 h-100">
    <div class="top-bar d-flex align-items-center justify-content-between w-100">
        <h4>LIST OF AVAILABLE DEPARTMENTS</h4>
        <div class="box d-flex">
            <a href="/import/department" class="btn btn-primary me-3">Import</a>
            <form id="export" action="/department-export" method="GET">
                @csrf
                <input type="hidden" name="department_ids" id="department_ids" value=""/>
                <button form="export" type="submit" id="export-rows"  class="btn btn-primary me-3">Export</button>
                <a href="/department/create" class="btn btn-primary">CREATE</a>
            </form>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <table class="table mt-3 table-striped">
        <thead>
            <th>
                <input type="checkbox" class="form-check-input" id="select-all-checkbox">
            </th>
            <th>Name</th>
            <th>Code</th>
            <th>Status</th>
            <th>Actions</th>
        </thead>
        <tbody>

        @foreach ($departments as $department)
            <tr>
                <td>
                    <input type="checkbox" class="form-check-input" id="select-checkbox" data-id="{{ $department->id }}">
                </td>
                <td>{{ $department->name }}</td>
                <td class="inner-table">{{ $department->department_id }}</td>
                <td class="inner-table">{{ $department->status }}</td>
                <td class="inner-table">

                    <form method="POST" action="{{ route('department.destroy', $department->id) }}">
                        <a class="btn btn-primary" href="/department/{{$department->id}}">Show</a>
                        <a class="btn btn-warning ms-3" href="/department/{{$department->id}}/edit">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ms-3">Delete</button>
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

        document.getElementById("department_ids").value = ids.join(",");
        this.submit();
    });

</script>

@endsection
