<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 
        'last_name', 
        'middle_name', 
        'birth_date', 
        'gender', 
        'marital_status', 
        'marital_status'
    ];    

    public function serviceRecords()
    {
        return $this->hasMany(ServiceRecord::class, 'employee_id');
    }

    public function latestServiceRecord()
    {
        return $this->hasOne(ServiceRecord::class, 'employee_id')
            ->select('employee_id', 'position', 'salary', 'date_from')
            ->orderByDesc('date_from');
    }
}
