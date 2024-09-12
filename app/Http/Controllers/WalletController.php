<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\Deposit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\DepositConfirmation;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $btc = Deposit::where('deposit_method', 'btc')->where('user_id', Auth::id())->where('deposit_status','confirmed')->sum('amount');
        $eth = Deposit::where('deposit_method', 'eth')->where('user_id', Auth::id())->where('deposit_status','confirmed')->sum('amount');
        $usdt = Deposit::where('deposit_method', 'usdt')->where('user_id', Auth::id())->where('deposit_status','confirmed')->sum('amount');
        $usdc = Deposit::where('deposit_method', 'usdc')->where('user_id', Auth::id())->where('deposit_status','confirmed')->sum('amount');
        return view('user.wallet.index', compact('btc', 'eth', 'usdt', 'usdc'));
    }
    /**
     * Display a listing of the resource.
     */
    public function walletAddress()
    {
        $btc = Wallet::where('wallet_name', 'btc')->where('user_id', Auth::id())->first();
        $eth = Wallet::where('wallet_name', 'eth')->where('user_id', Auth::id())->first();
        $usdt = Wallet::where('wallet_name', 'usdt')->where('user_id', Auth::id())->first();
        $usdc = Wallet::where('wallet_name', 'usdc')->where('user_id', Auth::id())->first();
        return view('user.wallet.address', compact('btc', 'eth', 'usdt', 'usdc'));
    }
    public function updateWalletAddress(Request $request)
    {
        $wallet = Wallet::find($request->id);

        if ($wallet) {
            $wallet->wallet_address = $request->wallet_address;
            $wallet->save();
            return response()->json(['success' => true, 'message' => 'Wallet address updated successfully.']);
        } else {
            $newWallet = new Wallet();
            $newWallet->user_id = Auth::id();
            $newWallet->wallet_name = $request->wallet_name;
            $newWallet->wallet_address = $request->wallet_address;
            $newWallet->save();
            return response()->json(['success' => true, 'message' => 'New wallet created successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Unable to update or create wallet.']);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function generateTrxId()
    {
        $numbers = strtoupper(substr(str_shuffle('0123456789'), 0, 4));
        $letters = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3));
        return 'DEP-' . $numbers . '-' . $letters;
    }
    public function depositRequest(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0.00000001|regex:/^\d+(\.\d{1,8})?$/',
            'deposit_method' => 'required|string',
        ]);

        $trxId = $this->generateTrxId();

        $deposit = Deposit::create([
            'user_id' => Auth::id(),
            'amount' => $validated['amount'],
            'deposit_method' => $validated['deposit_method'],
            'deposit_status' => 'unconfirmed',
            'trx_id' => $trxId,
        ]);

        // Send confirmation email
        Mail::to(Auth::user()->email)->send(new DepositConfirmation($deposit));

        return response()->json(['message' => 'Deposit successful']);
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
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wallet $wallet)
    {
        //
    }
}
