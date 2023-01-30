<?php

namespace App\Http\Controllers;

use App\Exports\DepartmentExport;
use App\Imports\DepartmentImport;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();

        return view('department.index', ['departments'=>$departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required| unique:departments,name',
            'department_id' => 'required|unique:departments,department_id'
        ]);

        Department::create([
            'name'           => $request->get('name'),
            'department_id'  => $request->get('department_id'),
            'status'         => $request->get('status'),
        ]);

        return redirect('/department');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $department->with('students')->get();
        return view('department.show', ['department' => $department]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('department.edit', ['data' => $department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $department->update($request->all());

        return redirect('/department');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect('/department');
    }

    public function import(Request $request)
    {
        Excel::import(new DepartmentImport, $request->file('file'));

        return redirect('/department')->with('success', 'File Imported Sucessfully!!😀');
    }

    public function export(Request $request)
    {
        $ids = explode(',', $request->input('department_ids'));

        return Excel::download(new DepartmentExport($ids), 'departments.xlsx');
    }

    public function upload()
    {
        return view('department.import');
    }
}
