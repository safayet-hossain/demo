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
}
