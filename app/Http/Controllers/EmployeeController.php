<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employee_create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'Skill' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'image' => 'required',
            'cv' => 'required',
          
        ]);

        $employee_image = '';
        if ($image = $request->hasFile('image')) {
            $image = $request->file('image');
            $employee_image = date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads/', $employee_image);
        }

        $employee_cv = '';
        if ($cv = $request->hasFile('cv')) {
            $cv = $request->file('cv');
            $employee_cv = date('Ymdhsi') . '.' . $cv->getClientOriginalExtension();
            $cv->storeAs('uploads/', $employee_cv);
        }
        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'age' => $request->age,
            'gender' => $request->gender,
            'Skill' => json_encode($request->Skill),
            'image' => $employee_image,
            'cv' => $employee_cv,


        ]);
        // dd($request->all());
    }
    public function employee_data()
    {
        $employee = Employee::all();
        // dd($employee);
        return response()->json($employee);
    }


    public function employee_delete($id)
    {
        $deletedata = Employee::find($id);
        // dd($deletedata);

        if ($deletedata) {
            $deletedata->delete();
            return response()->json([
                "status" => 200,
                "message" => 'deleted data of employee'

            ], 200);
        } else {
            return response()->json([
                "status" => 404,
                "message" => 'not found data '

            ], 404);
        }
    }

    public function emloyee_editdata($id)
    {
        $editdata = Employee::find($id);
        // dd($editdata);
        return response()->json($editdata);
    }

    public function employee_update(Request $request, $id)
    {
        // dd("ok",$id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'Skill' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'image' => 'required',
            'cv' => 'required',
        ]);

        $updatedata = Employee::find($id);

        $employee_image = $updatedata->image; //for getting old image
        if ($image = $request->hasFile('image')) {
            $image = $request->file('image');
            $employee_image = date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            
            $image->storeAs('uploads/', $employee_image);
        }

        $employee_cv= $updatedata->image; //for getting old cv
        if ($cv = $request->hasFile('cv')) {
            $cv = $request->file('cv');
            $employee_cv = date('Ymdhsi') . '.' . $cv->getClientOriginalExtension();
            $cv->storeAs('uploads/', $employee_cv);
        }
        // dd($updatedata);
        if ($updatedata) {
            $updatedata->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'age' => $request->age,
                'gender' => $request->gender,
                'Skill' => json_encode($request->Skill),
                'image' => $employee_image,
                'cv' => $employee_cv,
    
            ]);
            // dd($updatedata);
            //   dd($updatedata);
            // dd($request->all());
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No user Found'
            ]);
        }
    }
}
