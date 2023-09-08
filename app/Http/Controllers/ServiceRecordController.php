<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceRecord;
use App\Services\FormValidationService;

class ServiceRecordController extends Controller
{
    public function index()
    {
        $ser_recs = ServiceRecord::with('employee')->get()->toArray();
        return array_reverse($ser_recs);      
    }
    public function store(Request $request, FormValidationService $formValidationService)
    {
         $rules = [
                    'date_from' => 'required|string|max:255',
                    'date_to' => 'required|string|max:255',
                    'employee_id' => 'required|numeric',
                    'position' => 'required|string|max:255',
                    'salary' => 'required|numeric|min:5000'
                ];

        $validate_data = [
                            'date_from' => $request->input('date_from'),
                            'date_to' => $request->input('date_to'),
                            'employee_id' => $request->input('employee_id'),
                            'position' => $request->input('position'),
                            'salary' => $request->input('salary')
                        ];

        $ser_rec = new ServiceRecord($validate_data);

        $validationErrors = $formValidationService->validate($validate_data, $rules);

        if ($validationErrors) {
            return response()->json(['errors' => $validationErrors], 422);
        }

        $ser_rec->save();
        return response()->json('Service record created!');
    }
    public function show($id)
    {
        $ser_rec = ServiceRecord::find($id);
        return response()->json($ser_rec);
    }
    public function update($id, Request $request, FormValidationService $formValidationService)
    {
        $rules = [
                    'date_from' => 'required|string|max:255',
                    'date_to' => 'required|string|max:255',
                    'employee_id' => 'required|numeric',
                    'position' => 'required|string|max:255',
                    'salary' => 'required|numeric|min:5000'
                ];

        $ser_rec = ServiceRecord::find($id);
        $updated_ser_rec = $request->all();

        $validationErrors = $formValidationService->validate($updated_ser_rec, $rules);

        if ($validationErrors) {
            return response()->json(['errors' => $validationErrors], 422);
        }

        $ser_rec->update($updated_ser_rec);
        return response()->json('Service record updated!');
    }
    public function destroy($id)
    {
        $ser_rec = ServiceRecord::find($id);
        $ser_rec->delete();
        return response()->json('Service record deleted!');
    }
}
