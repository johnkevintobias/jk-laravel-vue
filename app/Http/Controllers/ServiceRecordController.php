<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceRecord;

class ServiceRecordController extends Controller
{
    public function index()
    {
        $ser_recs = ServiceRecord::all()->toArray();
        return array_reverse($ser_recs);      
    }
    public function store(Request $request)
    {
        $ser_rec = new ServiceRecord([
            'date_from' => $request->input('date_from'),
            'date_to' => $request->input('date_to'),
            'employee_id' => $request->input('employee_id'),
            'position' => $request->input('position'),
            'salary' => $request->input('salary')
        ]);
        $ser_rec->save();
        return response()->json('Service record created!');
    }
    public function show($id)
    {
        $ser_rec = ServiceRecord::find($id);
        return response()->json($ser_rec);
    }
    public function update($id, Request $request)
    {
        $ser_rec = ServiceRecord::find($id);
        $ser_rec->update($request->all());
        return response()->json('Service record updated!');
    }
    public function destroy($id)
    {
        $ser_rec = ServiceRecord::find($id);
        $ser_rec->delete();
        return response()->json('Service record deleted!');
    }
}
