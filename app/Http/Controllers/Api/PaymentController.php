<?php

namespace App\Http\Controllers\Api;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        
        if($payments ->count() > 0){

            return response()->json([
                'status' => 200,
                'payments' => $payments
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'No payment found'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:100',
            'phone' => 'required|digits:10',
            'payment_method' => 'required|string|max:50',
            'payment_id' => 'required|integer|max:1000',
            'currency' => 'required|string|max:1000',
            'amount' => 'required|string|max:1000',
            'transaction_id' => 'required|string|max:1000',
            'status' => 'required|string|max:20',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else{

            $payment = Payment::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,                
                'payment_method' => $request->payment_method,
                'payment_id' => $request->payment_id,
                'currency' => $request->currency,
                'amount' => $request->amount,
                'transaction_id' => $request->transaction_id,
                'status' => $request->status,
            ]);

            if($payment){
                return response()->json([
                    'status' => 200,
                    'message' => 'Payment created successfully',
                    'payment' => $payment
                ], 200);
            }else{
                return response()->json([
                    'status' => 500,
                    'message' => 'Internal server error'
                ], 500);
            }
        }
    }

    public function show($id)
    {
        $payment = Payment::find($id);

        if($payment){
            return response()->json([
                'status' => 200,
                'payment' => $payment
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Payment not found'
            ], 404);
        }
    }

    public function edit($id)
    {
        $payment = Payment::find($id);

        if($payment){
            return response()->json([
                'status' => 200,
                'payment' => $payment
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Payment not found'
            ], 404);
        }
    }

    public function update($id)
    {
        $payment = Payment::find($id);

        if($payment){
            $payment->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,                
                'payment_method' => $request->payment_method,
                'payment_id' => $request->payment_id,
                'currency' => $request->currency,
                'amount' => $request->amount,
                'transaction_id' => $request->transaction_id,
                'status' => $request->status,
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Payment updated successfully',
                'payment' => $payment
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Payment not found'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $payment = Payment::find($id);

        if($payment){
            $payment->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Payment deleted successfully'
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Payment not found'
            ], 404);
        }
    }
}
