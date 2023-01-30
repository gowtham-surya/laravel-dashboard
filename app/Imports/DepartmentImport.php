<?php

namespace App\Imports;

use Throwable;
use App\Models\Department;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class DepartmentImport implements ToModel, WithValidation, SkipsOnError, WithHeadingRow
{
    use Importable, SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Department([
            'name'          => $row['name'],
            'department_id' => $row['id'],
            'status'        => $row['status'],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.name' => 'unique:departments,name',
            '*.id'   => 'unique:departments,department_id'
        ];
    }

    public function onError(Throwable $e)
    {
        //
    }
}
