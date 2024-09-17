<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $withdrawals = Withdrawal::where('user_id', auth()->user()->id)->get();
        return view('withdrawal', compact('withdrawals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function withdrawalRequest(Request $request)
    {
        $request->validate([
            'wallet_id' => 'required|string',
            'amount' => 'required|string',
        ]);

        $trxId = 'TRX-' . strtoupper(uniqid());

        // Create a new withdrawal record
        Withdrawal::create([
            'user_id' => auth()->user()->id,
            'wallet_id' => $request->wallet_id,
            'amount' => $request->amount,
            'trx_id' => $trxId,
            'status' => 'pending',
        ]);

        return response()->json(['message' => 'Withdrawal request submitted successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Withdrawal $withdrawal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Withdrawal $withdrawal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Withdrawal $withdrawal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Withdrawal $withdrawal)
    {
        //
    }
}
