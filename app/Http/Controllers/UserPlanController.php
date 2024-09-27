<?php

namespace App\Http\Controllers;

use App\Models\UserPlan;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\PlanPurchaseMail;
use Illuminate\Support\Facades\DB;


class UserPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_balance = Deposit::where('user_id', auth()->id())->first();

        if (!$user_balance || $user_balance->amount_in_gbp <= 999) {
            return redirect()->route('deposit')->with('error', 'Please complete KYC verification before trading.');
        }
        return view('plans', [
            'user_balance' => $user_balance->amount_in_gbp,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $userEmail = Auth::user()->email;

        // Validate incoming request data
        $data = $request->validate([
            'plan_name' => 'required|string',
            'plan_amount' => 'required|numeric', // Ensure the amount is numeric
            'plan_option' => 'required|string'
        ]);

        $planAmount = floatval($data['plan_amount']);

        // Check if the user already has an active plan
        $existingPlan = UserPlan::where('user_id', $userId)
                                ->where('status', 'Active')
                                ->first();

        if ($existingPlan) {
            return response()->json(['success' => false, 'message' => 'You have an active plan. Please wait for the maturity period.'], 400);
        }

        // Retrieve the user's confirmed deposit from the deposits table
        $userDeposit = Deposit::where('user_id', $userId)
                            ->where('deposit_status', 'confirmed')
                            ->first();

        // Check if a confirmed deposit exists
        if (!$userDeposit) {
            return response()->json(['success' => false, 'message' => 'No confirmed deposit found for user.'], 400);
        }

        $depositAmount = floatval($userDeposit->amount_in_gbp);

        // Check if the user's deposit is sufficient
        if ($planAmount > $depositAmount) {
            return response()->json(['success' => false, 'message' => 'Insufficient balance.'], 400);
        }

        // If sufficient balance, subtract the plan amount from the deposit
        $updatedDepositAmount = $depositAmount - $planAmount;

        // Update the deposit amount directly
        $updateSuccessful = Deposit::where('id', $userDeposit->id)
                                ->update(['amount_in_gbp' => $updatedDepositAmount]);

        if (!$updateSuccessful) {
            return response()->json(['success' => false, 'message' => 'Failed to update deposit balance.'], 500);
        }

        // Create the user's plan
        $userPlan = UserPlan::create([
            'user_id' => $userId,
            'plan_selected' => $data['plan_name'],
            'plan_amount' => $data['plan_amount'],
            'plan_option' => $data['plan_option'],
            'status' => 'Active'
        ]);

        // Send a confirmation email to the user
        Mail::to($userEmail)->send(new PlanPurchaseMail($userPlan));

        return response()->json(['success' => true, 'message' => 'Plan purchased successfully.']);
    }
    public function destroy(UserPlan $userPlan)
    {
        //
    }
}
