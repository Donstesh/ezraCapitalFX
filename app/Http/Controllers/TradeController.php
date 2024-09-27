<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use App\Models\KycVerify;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class TradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = Auth::user();

        // Check if KYC verification record exists
        $kyc = KycVerify::where('user_id', $user->id)->first();

        if (!$kyc || $kyc->status === 'pending') {
            // If no KYC record or KYC is pending, redirect to the KYC page
            return redirect()->route('kyc')->with('error', 'Please complete KYC verification before trading.');
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
    public function startTrading($userId)
    {
        // Schedule the command to run every hour for a specific user
        \Artisan::call('trade:generate-profit', ['user_id' => $userId]);

        return response()->json(['message' => 'Trading simulator started! Profit/Loss generation is scheduled.']);
    }
}
