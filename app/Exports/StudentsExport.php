<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentsExport implements FromQuery, WithHeadings, WithMapping
{
    protected $ids;

    public function __construct( $ids )
    {
        $this->ids = $ids;
    }

    public function map($student): array
    {
        return [
            $student->id,
            $student->name,
            $student->rollno,
            $student->email,
            $student->department->name,
            $student->status
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Roll Number',
            'Email',
            'Department',
            'Status'
        ];
    }

    public function query()
    {
        return Student::query()->whereIn('id', $this->ids);
    }
}
