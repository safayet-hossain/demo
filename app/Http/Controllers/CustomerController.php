<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function datasave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'Skills' => 'required',
            'gender' => 'required',
            'Degree' => 'required',
        ]);


        $customer_image = '';
        if ($image = $request->hasFile('image')) {
            $image = $request->file('image');
            $customer_image = date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads/', $customer_image);
        }
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'Skills' => $request->Skills,
            'gender' => $request->gender,
            'Degree' => json_encode($request->Degree),
            'image' => $customer_image,


        ]);
        // dd($request->all());
    }
    public function customerdata()
    {
        $customer = Customer::orderby('id', 'DESC')->take(100)->get();
        // dd($customer);
        return response()->json($customer);
    }
    public function edit($id)
    {
        $updatedata = Customer::find($id);
        // dd($updatedata);
        return response()->json($updatedata);
    }
    public function update(Request $request, $id)
    {
        // dd("ok",$id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'Skills' => 'required',
            'gender' => 'required',
            'Degree' => 'required',
        ]);

        $updatedata = Customer::find($id);
        $customer_image = $updatedata->image; //for getting old image
        if ($image = $request->hasFile('image')) {
            $image = $request->file('image');
            $customer_image = date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads/', $customer_image);
        }
        // dd($updatedata);
        if ($updatedata) {
            $updatedata->update([
                'name' => $request->name,
                'email' => $request->email,
                'Skills' => $request->Skills,
                'gender' => $request->gender,
                'Degree' => json_encode($request->Degree),
                'image' => $customer_image,
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
    public function deletedata($id)
    {
        $deletedata = Customer::find($id);
        // dd($deletedata)
        if ($deletedata) {
            $deletedata->delete();
            return response()->json([
                "status" => 200,
                "message" => 'deleted'

            ], 200);
        } else {
            return response()->json([
                "status" => 404,
                "message" => 'deleted'

            ], 404);
        }
    }
}
