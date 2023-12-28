<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function datastore(Request $request){
        Student::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'dob'=>$request->birthday,
            'Address'=>$request->address,
            'phone'=>$request->phone,
            // 'image'=>$request->image,
            

        ]);
        // dd($request);
    }
    public function getdata(){
        $Student=Student::all();
        return response()->json($Student);
    }
    public function editdata($id){
        $updatedata=Student::find($id);
        return response()->json($updatedata);
       
    }
    public function updatedata(Request $request, $id){
          $updatedata=Student::findorfail($id);

        $updatedata->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'dob'=>$request->birthday,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'image'=>$request->image,

        ]);
    }
    public function delete($id)
    {
        $student=Student::find($id);
        $student->delete();
        return to_route('get.data');
    }
        
}
