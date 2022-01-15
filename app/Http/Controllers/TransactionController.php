<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function carts()
    {
        return view('transactions.carts');
    }

    public function checkout(Request $request)
    {
        $transaction = new Transaction();
        $transaction->save();

        return redirect()->route('receipt', ['key' => $transaction->key])->with('success', 'Transaction success!');
    }

    public function receipt($key)
    {
        $transaction = Transaction::where('key', $key)->first();

        return view('transactions.receipt', compact('transaction'));
    }
}
