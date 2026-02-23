<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email'];

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }

    public function getTotalBalance()
    {
        return $this->wallets->sum(function ($wallet) 
        {
            return $wallet->getBalance();
        });
    }
}
