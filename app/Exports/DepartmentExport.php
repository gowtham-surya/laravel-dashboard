<?php

namespace App\Exports;

use App\Models\Department;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DepartmentExport implements FromQuery, WithHeadings, WithMapping
{
    protected $ids;

    public function __construct( $ids )
    {
        $this->ids = $ids;
    }

    public function map($department): array
    {
        return [
            $department->id,
            $department->name,
            $department->department_id,
            $department->status
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Department Name',
            'Code',
            'Status',
        ];
    }

    public function query()
    {
        return Department::query()->whereIn('id', $this->ids);
    }
}
