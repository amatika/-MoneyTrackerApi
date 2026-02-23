<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;    

class UserController extends Controller
{
    // Store new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email'
        ]);

        $user = User::create($validated);

        return response()->json($user, 201);
    }

    // Show user profile
    public function show($id)
    {
        $user = User::with('wallets.transactions')->findOrFail($id);

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'wallets' => $user->wallets->map(function ($wallet) {
                return [
                    'id' => $wallet->id,
                    'name' => $wallet->name,
                    'balance' => $wallet->balance
                ];
            }),
            'total_balance' => $user->getTotalBalance()
        ]);
    }
}