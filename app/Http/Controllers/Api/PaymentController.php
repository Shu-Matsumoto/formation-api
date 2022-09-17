<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \App\Models\User::find($id);
        $payment = [
            'credit_card_number' => $user->credit_card_number,
            'financial_institution_id	' => $user->financial_institution_id,
            'bank_number' => $user->bank_number,
        ];
        return response()->json([
            'message' => 'success',
            'data' => $payment,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = \App\Models\User::find($id)->fill([
            'credit_card_number' => $request->input('credit_card_number'),
            'financial_institution_id' => $request->input('financial_institution_id'),
            'bank_number' => $request->input('bank_number'),
        ]);
        $user->save();
        $payment = [
            'credit_card_number' => $user->credit_card_number,
            'financial_institution_id	' => $user->financial_institution_id,
            'bank_number' => $user->bank_number,
        ];
        return response()->json([
            'message' => 'success',
            'data' => $payment,
        ], 200);
    }
}
