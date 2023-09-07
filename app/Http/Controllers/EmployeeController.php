<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all()->toArray();
        return array_reverse($employees);      
    }
    public function store(Request $request)
    {
        $employee = new Employee([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'middle_name' => $request->input('middle_name'),
            'birth_date' => $request->input('birth_date'),
            'gender' => $request->input('gender'),
            'marital_status' => $request->input('marital_status')
        ]);
        $employee->save();
        return response()->json('Employee created!');
    }
    public function show($id)
    {
        $employee = Employee::find($id);
        return response()->json($employee);
    }
    public function update($id, Request $request)
    {
        $employee = Employee::find($id);
        $employee->update($request->all());
        return response()->json('Employee updated!');
    }
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return response()->json('Employee deleted!');
    }
}
