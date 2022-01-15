<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function carts()
    {
        $foods = getFoodsInCarts();

        return view('transactions.carts', compact('foods'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required',
        ]);

        $foods = getFoodsInCarts();

        $trans = new Transaction();
        $trans->key = Str::random(50);
        $trans->user_id = Auth::id();
        $trans->shipping_address = $request->shipping_address;
        $trans->save();

        foreach ($foods as $food) {
            $transDetail = new TransactionDetail();
            $transDetail->transaction_id = $trans->id;
            $transDetail->food_id = $food->id;
            $transDetail->price = $food->price;
            $transDetail->save();
        }

        unsetCookie('carts');

        return redirect()->route('transactions.receipt', ['key' => $trans->key])->with('success', 'Transaction success!');
    }

    public function receipt($key)
    {
        $transaction = Transaction::where('key', $key)->first();

        return view('transactions.receipt', compact('transaction'));
    }
}
