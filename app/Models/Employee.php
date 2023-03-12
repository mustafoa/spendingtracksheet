<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'total', 'given', 'comment', 'employee_men_id'];

    protected $guarded = ['id'];

    public function employeemen() {
        return $this->belongsTo(EmployeeMen::class);
    }
}
