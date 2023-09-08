<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Services\FormValidationService;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['latestServiceRecord'])->get()->toArray();
        return array_reverse($employees);      
    }
    public function store(Request $request, FormValidationService $formValidationService)
    {
        $rules = [
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'birth_date' => 'required|string|max:255',
                    'gender' => 'required|string|max:255',
                    'marital_status' => 'required|string|max:255',
                ];

        $validate_data = [
                            'first_name' => $request->input('first_name'),
                            'last_name' => $request->input('last_name'),
                            'middle_name' => $request->input('middle_name'),
                            'birth_date' => $request->input('birth_date'),
                            'gender' => $request->input('gender'),
                            'marital_status' => $request->input('marital_status')
                        ];

        $employee = new Employee($validate_data);

        $validationErrors = $formValidationService->validate($validate_data, $rules);

        if ($validationErrors) {
            return response()->json(['errors' => $validationErrors], 422);
        }

        $employee->save();
        return response()->json('Employee created!');
    }
    public function show($id)
    {
        $employee = Employee::find($id);
        return response()->json($employee);
    }
    public function update($id, Request $request, FormValidationService $formValidationService)
    {
        $rules = [
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'birth_date' => 'required|string|max:255',
                    'gender' => 'required|string|max:255',
                    'marital_status' => 'required|string|max:255',
                ];

        $employee = Employee::find($id);
        $updated_data = $request->all();
        $validationErrors = $formValidationService->validate($updated_data, $rules);

        if ($validationErrors) {
            return response()->json(['errors' => $validationErrors], 422);
        }

        $employee->update($updated_data);
        return response()->json('Employee updated!');
    }
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return response()->json('Employee deleted!');
    }
}
