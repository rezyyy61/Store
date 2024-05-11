<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{

    public function showPaymentForm()
    {
        return view('products.payment');
    }

    public function checkout(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = Charge::create([
                'amount' => 10, // amount in cents
                'currency' => 'euro',
                'source' => $request->stripeToken,
                'description' => 'Example Charge',
            ]);

            // Payment successful
            Log::info('payment.success');
        } catch (\Exception $e) {
            // Payment failed
           Log::error('error', (array)$e->getMessage());
        }
    }
}
