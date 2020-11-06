<?php


namespace App\Helpers;

use App\Preference;
use App\Product;
use App\Transaction;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\Environment\Console;

class TransactionHelper
{
    public static function add($request)
    {

        $openingBalance = Preference::find(1)->balance;
        $newbalance = Preference::find(1)->balance;

        // dd($openingBalance);
        $type = $request->type;


        // dd($type);

        if ($type == 'Payment') {
            // dd('credit');
            $amount = $request->credit;
            $closingBalance  = $openingBalance - $amount;
            $newbalance = $closingBalance;
            $transaction = Transaction::create([
                'opening_balance' => $openingBalance,
                'closing_balance' => $closingBalance,
            ] + $request->all());
        }

        if ($type == 'Recovery') {
            $amount = $request->debit;
            $closingBalance  = $openingBalance + $amount;
            $newbalance = $closingBalance;
            $transaction = Transaction::create([
                'opening_balance' => $openingBalance,
                'closing_balance' => $closingBalance,
            ] + $request->all());
        }

        if ($request->sale_type == 'cash') {
            $amount = $request->amount;

            $closingBalance  = $openingBalance + $amount;
            $newbalance = $closingBalance;

            $transaction = Transaction::create($request->all() + [
                'opening_balance' => $openingBalance,
                'closing_balance' => $closingBalance,
                'debit' => $amount,
                'description' => 'Payment received by cash'

            ]);
        }
        if ($request->sale_type == 'card') {
            $amount = $request->amount;

            $closingBalance  = $openingBalance + $amount;
            $newbalance = $closingBalance;

            $transaction = Transaction::create($request->all() + [
                'opening_balance' => $openingBalance,
                'closing_balance' => $closingBalance,
                'credit' => $amount,
                'description' => 'Need to get payment by card'

            ]);
        }

        $balance = Preference::find(1);
        $balance->update([
            'balance' => $closingBalance,
        ]);
    }
}
