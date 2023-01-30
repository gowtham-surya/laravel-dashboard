<?php

namespace App\Imports;

use Throwable;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentsImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $department = $row['department'];

        $department_data = DB::table('departments')->where('department_id', $department)->get();

        return new Student([
            'name'          => $row['name'],
            'rollno'        => $row['rollno'],
            'email'         => $row['email'],
            'department_id' => $department_data[0]->id,
            'status'        => $row['status'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.rollno' => 'unique:students,rollno',
            '*.email' => 'unique:students,email',
        ];
    }

    public function onError(Throwable $e)
    {
        //
    }
}
