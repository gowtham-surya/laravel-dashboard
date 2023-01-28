<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    public function students() {
        return $this->hasMany(Student::class);
    }

    use HasFactory;

    protected $fillable = [
        'name',
        'department_id',
        'status',
    ];
}
