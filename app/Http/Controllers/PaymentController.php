<?php

namespace App\Http\Controllers;

use App\Sales;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function stripe($id){
        $sale= Sales ::find($id);
        // dd($sale);
        return view('payment.card')->with('sale',$sale);
    }


    public function paymentProcess(Request $request)
    {
        // dd($request);
        $sale = Sales::find($request->sale_id);
        Stripe::setApiKey("sk_test_51C6cOFEnhuhwvHarhmZDu5sbaAeGGNdBIu1aNWiEymve4vkePDsI6bgT26n71WFuzkW0MsDWR2nEmZrzaOdJrfEK00r2WPtteh");
        $token = $request->stripeToken;
        $charge = Charge::create([
            'amount' => $sale->amount*100,
            'currency' =>'usd',
            // 'description'=>'example description',
            'source' => $request->stripeToken,
        ]);
        // $request->session()->flash('success', 'Payment successful!');
        $sale->update(['type'=>'paid']);
        $pagesales= Sales::all();

        return view('sales.allsales')->with('products',$pagesales);
    }
}
