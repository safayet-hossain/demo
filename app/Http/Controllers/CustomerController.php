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
            'email' => 'required',
            'Skills' => 'required',
            'gender' => 'required'
        ]);

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'Skills' => $request->Skills,
            'gender' => $request->gender,
            // 'image'=>$request->image,


        ]);
    }
    public function customerdata()
    {
        $customer = Customer::all();
        // dd($customer);
        return response()->json($customer);
    }
    public function edit($id)
    {
        $updatedata = Customer::find($id);
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
        ]);

        $updatedata = Customer::find($id);
        // dd($updatedata);
        if ($updatedata) {
            $updatedata->update([
                'name' => $request->name,
                'email' => $request->email,
                'Skills' => $request->Skills,
                'gender' => $request->gender,
            ]);
            // dd($updatedata);
        }
        //   dd($updatedata);
        // dd($request->all());
        else {
            return response()->json([
                'status' => 404,
                'message' => 'No user Found'
            ]);
        }

    }
    public function deletedata($id)
    {
        $deletedata = Customer::find($id);
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
