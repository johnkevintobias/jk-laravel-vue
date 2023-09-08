<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_from', 
        'date_to', 
        'employee_id', 
        'position', 
        'salary'
    ]; 

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
