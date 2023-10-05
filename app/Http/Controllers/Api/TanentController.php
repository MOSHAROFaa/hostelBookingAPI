<?php

namespace App\Http\Controllers\Api;

use App\Models\Tanent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TanentController extends Controller
{
    //
    // public function index()
    // {
    //     return response()->json([
    //         'message' => 'Hello tanent!',
    //     ], 200);
    // }

// GET METHOD - GET ALL
    public function index()
    {
        $tanent = Tanent::all();

        if ($tanent->count() > 0) {
            return response()->json([
                'status' => 'success',
                'tanent' => $tanent
            ], 200);
        } else {
            return response()->json([
                'status' => 'Error',
                'message' => 'No tanent found'
            ], 404);
        }
    }

// GET by ID
    public function show($id)
    {
        $tanent = Tanent::find($id);

        if ($tanent) {
            return response()->json([
                'status' => 'success',
                // 'tanent' => "Tanent with ID $id found",
                'tanent' => $tanent

            ], 200);
        } else {
            return response()->json([
                'status' => 'Error',
                'message' => 'No tanent found'
            ], 404);
        }
    }

// POST METHOD
    public function store(Request $request)
    {
        $validator = Validator::make(
            request()->all(),
            [
                'tanent name' => 'required|max:200',
                'tanent gender' => 'required|max:10',
                'tanent age' => 'required|digits:2',
                'tanent occupation' => 'required|max:200',
                'tanent id number' => 'required|max:50',
                'tanent email' => 'required|email|max:50',
                'tanent mobile number' => 'required|max:50',
                'tanent address' => 'required|max:200',
                'tanent nationality' => 'required|max:100',
                'tanent deposit' => 'required|max:100',
                'tanent room number' => 'required|max:20',
                'tanent room type' => 'required|max:200',
                'tanent room price per month'=> 'required|max:100',
                'tanent room status' => 'required|max:20',
                'tanent room check in date' => 'required|max:20',
                'tanent room check out date' => 'required|max:20',
                'tanent room booking payment status' => 'required|max:20',
                'tanent room booking payment amount' => 'required|max:100'
            ]
        );

        if($validator->fails()){
            return response()->json([
                'status' => 'Input error',
                'errors' => $validator->messages()
            ], 422);
        }
        else{
            $tanent = Tanent::create([
                'tanent name' => $request-> input('tanent name'),
                'tanent gender' => $request-> input('tanent gender'),
                'tanent age' => $request-> input('tanent age'),
                'tanent occupation' => $request-> input('tanent occupation'),
                'tanent id number' => $request-> input('tanent id number'),
                'tanent email' => $request-> input('tanent email'),
                'tanent mobile number' => $request-> input('tanent mobile number'),
                'tanent address' => $request-> input('tanent address'),
                'tanent nationality' => $request-> input('tanent nationality'),
                'tanent deposit' => $request-> input('tanent deposit'),
                'tanent room number' => $request-> input('tanent room number'),
                'tanent room type' => $request-> input('tanent room type'),
                'tanent room price per month' => $request-> input('tanent room price per month'),
                'tanent room status' => $request-> input('tanent room status'),
                'tanent room check in date' => $request-> input('tanent room check in date'),
                'tanent room check out date' => $request-> input('tanent room check out date'),
                'tanent room booking payment status' => $request-> input('tanent room booking payment status'),
                'tanent room booking payment amount' => $request-> input('tanent room booking payment amount')
            ]);

            if($tanent){
                return response()->json([
                    'status' => 'Success',
                    'message' => 'Tanent created successfully',
                    'tanent' => $tanent
                ], 200);
            }
            else{
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Tanent could not be created'
                ], 500);
            }
        }
    }

// PUT METHOD
// public function update(Request $request, int $id)
// {
//     $tanent = Tanent::find($id);

//     if (!$tanent) {
//         return response()->json([
//             'status' => 'Error',
//             'message' => "Tanent with ID $id not found"
//         ], 404);
//     }

//     $validator = Validator::make($request->all(), [
//         // Validation rules here
//         'tanent name' => 'required|max:200',
//         'tanent gender' => 'required|max:10',
//         'tanent age' => 'required|digits:2',
//         'tanent occupation' => 'required|max:200',
//         'tanent id number' => 'required|max:50',
//         'tanent email' => 'required|email|max:50',
//         'tanent mobile number' => 'required|max:50',
//         'tanent address' => 'required|max:200',
//         'tanent nationality' => 'required|max:100',
//         'tanent deposit' => 'required|max:100',
//         'tanent room number' => 'required|max:20',
//         'tanent room type' => 'required|max:200',
//         'tanent room price per month'=> 'required|max:100',
//         'tanent room status' => 'required|max:20',
//         'tanent room check in date' => 'required|max:20',
//         'tanent room check out date' => 'required|max:20',
//         'tanent room booking payment status' => 'required|max:20',
//         'tanent room booking payment amount' => 'required|max:100'
//     ]);

//     if ($validator->fails()) {
//         return response()->json([
//             'status' => 'Input error',
//             'errors' => $validator->messages()
//         ], 422);
//     }

    // $tanent->update([
    //     'tanent name' => $request->input('tanent name'),
    //     'tanent gender' => $request->input('tanent gender'),
    //     'tanent age' => $request->input('tanent age'),
    //     'tanent occupation' => $request->input('tanent occupation'),
    //     'tanent id number' => $request->input('tanent id number'),
    //     'tanent email' => $request->input('tanent email'),
    //     'tanent mobile number' => $request->input('tanent mobile number'),
    //     'tanent address' => $request->input('tanent address'),
    //     'tanent nationality' => $request->input('tanent nationality'),
    //     'tanent deposit' => $request->input('tanent deposit'),
    //     'tanent room number' => $request->input('tanent room number'),
    //     'tanent room type' => $request->input('tanent room type'),
    //     'tanent room price per month' => $request->input('tanent room price per month'),
    //     'tanent room status' => $request->input('tanent room status'),
    //     'tanent room check in date' => $request->input('tanent room check in date'),
    //     'tanent room check out date' => $request->input('tanent room check out date'),
    //     'tanent room booking payment status' => $request->input('tanent room booking payment status'),
    //     'tanent room booking payment amount' => $request->input('tanent room booking payment amount')
    // ]);

    // return response()->json([
    //     'status' => 'Success',
    //     'message' => 'Tanent updated successfully',
    //     'tanent' => $tanent
    // ], 200);



    // Want to update 1 or 2 elements
    // if ($request->has('tanent name')) {
    //     $tanent->tanent_name = $request->input('tanent name');
    // }

    // if ($request->has('tanent gender')) {
    //     $tanent->tanent_gender = $request->input('tanent gender');
    // }

    // if ($request->has('tanent age')) {
    //     $tanent->tanent_age = $request->input('tanent age');
    // }

    // if ($request->has('tanent occupation')) {
    //     $tanent->tanent_occupation = $request->input('tanent occupation');
    // }

    // if ($request->has('tanent id number')) {
    //     $tanent->tanent_id_number = $request->input('tanent id number');
    // }

    // if ($request->has('tanent email')) {
    //     $tanent->tanent_email = $request->input('tanent email');
    // }

    // if ($request->has('tanent mobile number')) {
    //     $tanent->tanent_mobile_number = $request->input('tanent mobile number');
    // }

    // if ($request->has('tanent address')) {
    //     $tanent->tanent_address = $request->input('tanent address');
    // }

    // if ($request->has('tanent nationality')) {
    //     $tanent->tanent_nationality = $request->input('tanent nationality');
    // }

    // if ($request->has('tanent deposit')) {
    //     $tanent->tanent_deposit = $request->input('tanent deposit');
    // }

    // if ($request->has('tanent room number')) {
    //     $tanent->tanent_room_number = $request->input('tanent room number');
    // }

    // if ($request->has('tanent room type')) {
    //     $tanent->tanent_room_type = $request->input('tanent room type');
    // }

    // if ($request->has('tanent room price per month')) {
    //     $tanent->tanent_room_price_per_month = $request->input('tanent room price per month');
    // }

    // if ($request->has('tanent room status')) {
    //     $tanent->tanent_room_status = $request->input('tanent room status');
    // }

    // if ($request->has('tanent room check in date')) {
    //     $tanent->tanent_room_check_in_date = $request->input('tanent room check in date');
    // }

    // if ($request->has('tanent room check out date')) {
    //     $tanent->tanent_room_check_out_date = $request->input('tanent room check out date');
    // }

    // if ($request->has('tanent room booking payment status')) {
    //     $tanent->tanent_room_booking_payment_status = $request->input('tanent room booking payment status');
    // }

    // if($request->has('tanent room booking payment amount')){
    //     $tanent->tanent_room_booking_payment_amount = $request->input('tanent room booking payment amount');
    // }

    // $tanent->save();

    // return response()->json([
    //     'status' => 'Success',
    //     'message' => 'Tanent updated successfully',
    //     'tanent' => $tanent
    // ], 200);

// PUT Method
public function update(Request $request, int $id){
    $tanent = Tanent::find($id);

    if (!$tanent) {
        return response()->json([
            'status' => 'Error',
            'message' => "Tanent with ID $id not found"
        ], 404);
    }

    // Get the request data
    $requestData = $request->only([
        'tanent name',
        'tanent gender',
        'tanent age',
        'tanent occupation',
        'tanent id number',
        'tanent email',
        'tanent mobile number',
        'tanent address',
        'tanent nationality',
        'tanent deposit',
        'tanent room number',
        'tanent room type',
        'tanent room price per month',
        'tanent room status',
        'tanent room check in date',
        'tanent room check out date',
        'tanent room booking payment status',
        'tanent room booking payment amount'
    ]);

    // Define validation rules based on provided fields
    $validationRules = [];
    foreach ($requestData as $field => $value) {
        $validationRules[$field] = 'required|max:200';  // Change 200 to the appropriate max length
    }

    // Validate the request data
    $validator = Validator::make($requestData, $validationRules);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'Input error',
            'errors' => $validator->messages()
        ], 422);
    }

    // Update specific fields
    foreach ($requestData as $field => $value) {
        $tanent->{$field} = $value;
    }

    $tanent->save();

    return response()->json([
        'status' => 'Success',
        'message' => 'Tanent updated successfully',
        'tanent' => $tanent
    ], 200);
}

// DELETE METHOD
    public function destroy($id)
    {
        $tanent = Tanent::find($id);

        if ($tanent) {
            $tanent->delete();

            return response()->json([
                'status' => 'Success',
                'message' => "Tanent with ID $id deleted successfully"
            ], 200);
        } else {
            return response()->json([
                'status' => 'Error',
                'message' => "Tanent with ID $id not found"
            ], 404);
        }
    }



}
