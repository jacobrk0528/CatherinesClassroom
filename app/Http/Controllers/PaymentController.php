<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionItems;
use Inertia\Response;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PaymentController extends Controller
{
    public function checkout(Cart $cart): RedirectResponse
    {
        Stripe::setApiKey(env("STRIPE_SECRET"));

        $cartItems = $cart->cartItems()->with('resource.resourceable')->get();

        $lineItems = $cartItems->map(function ($item) {
            return [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item->resource->resourceable->name,
                    ],
                    'unit_amount' => $item->resource->resourceable->price * 100,
                ],
                'quantity' => $item->quantity,
            ];
        })->toArray();

        $transaction = Transaction::create([
            "user_id" => Auth::user()->id ?? null,
            "transaction_status" => "pending",
            "transaction_amount" => $cart->cart_total
        ]);

        foreach ($cartItems as $item) {
            TransactionItems::create([
                "transaction_id" => $transaction->id,
                "resource_id" => $item->resource_id
            ]);
        }

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success', $transaction),
            'cancel_url' => route('home'), // Eventually want to change this to go back to the cart
        ]);

        return Redirect($session->url);
    }

    public function success(Transaction $transaction): Response
    {
        if ($transaction) {
            $transaction->update([
                'transaction_status' => 'complete',
            ]);
        }

        // TODO: log the tranasaction in the visitor transactions table to track order
        return Inertia::render('Checkout/Success');
    }
}
