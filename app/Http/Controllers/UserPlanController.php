<?php

namespace App\Http\Controllers;

use App\Models\UserPlan;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

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
        $data = $request->validate([
            'plan_name' => 'required|string',
            'plan_amount' => 'required|string',
            'plan_option' => 'required|string'
        ]);

        $userPlan = UserPlan::create([
            'user_id' => $userId,
            'plan_selected' => $data['plan_name'],
            'plan_amount' => $data['plan_amount'],
            'plan_option' => $data['plan_option'],  // You can customize this based on your requirements
            'status' => 'Active'  // You can customize this based on your requirements
        ]);

        Mail::to($userEmail)->send(new PlanPurchasedMail($userPlan));

        return response()->json(['success' => true]);
    }

    public function destroy(UserPlan $userPlan)
    {
        //
    }
}
