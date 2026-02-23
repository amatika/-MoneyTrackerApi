<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wallet;

class WalletController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string'
        ]);

        $wallet = Wallet::create($validated);

        return response()->json($wallet, 201);
    }

    public function show($id)
    {
        $wallet = Wallet::with('transactions')->findOrFail($id);

        return response()->json([
            'id' => $wallet->id,
            'name' => $wallet->name,
            'balance' => $wallet->getBalance(),
            'transactions' => $wallet->transactions
        ]);
    }
}