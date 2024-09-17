<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use App\Models\KycVerify;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;


class TradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = Auth::user();

        // Check if KYC verification record exists
        $kyc = KycVerify::where('user_id', $user->id)->first();

        if (!$kyc) {
            // If no KYC record, redirect to the KYC page
            return redirect()->route('user.profile.kyc'); // Update 'kyc.page' with the correct route name for KYC page
        }

        $status = $kyc->status;
        $user_balance = Deposit::where('user_id', $user->id)->first();

        return view('trading-room', [
            'status' => $status,
            'user_balance' => $user_balance,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Trade $trade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trade $trade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trade $trade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trade $trade)
    {
        //
    }
}
