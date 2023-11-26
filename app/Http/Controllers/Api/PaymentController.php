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
            'payment_id' => 'required|integer',
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|digits:10',
            'address' => 'required|string|max:191',
            'city' => 'required|string|max:191',
            'zip_code' => 'required|digits:6',
            'country' => 'required|string|max:191',
            'payment_method' => 'required|string|max:191',
            'payment_id' => 'required|integer',
            'currency' => 'required|string',
            'amount' => 'required|numeric',
            'status' => 'required|string|max:191',
            'payment_date' => 'required|date',
            'user_id' => 'required|integer',
            'reference_id' => 'required|integer',
            'card_id' => 'required|integer',
            'transaction_id' => 'required|integer',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }else{

            $payment = Payment::create([
                'payment_id' => $request->payment_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,                
                'payment_method' => $request->payment_method,
                'payment_id' => $request->payment_id,
                'currency' => $request->currency,
                'amount' => $request->amount,
                'transaction_id' => $request->transaction_id,
                'status' => $request->status,
                'payment_date' => $request->payment_date,
                'user_id' => $request->user_id,
                'reference_id' => $request->reference_id,
                'card_id' => $request->card_id,
                'transaction_id' => $request->transaction_id,
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
                'payment_id' => $request->payment_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,                
                'payment_method' => $request->payment_method,
                'payment_id' => $request->payment_id,
                'currency' => $request->currency,
                'amount' => $request->amount,
                'transaction_id' => $request->transaction_id,
                'status' => $request->status,
                'payment_date' => $request->payment_date,
                'user_id' => $request->user_id,
                'reference_id' => $request->reference_id,
                'card_id' => $request->card_id,
                'transaction_id' => $request->transaction_id,
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
