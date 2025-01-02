<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Inertia\Response;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function checkout(Request $request, Cart $cart): RedirectResponse
    {
        Stripe::setApiKey(env("STRIPE_SECRET"));

        $lineItems = $cart->cartItems()->with('resource.resourceable')
            ->get()
            ->map(function ($item) {
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

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);

        /*Log::info($session);*/

        return Redirect($session->url);
    }


    public function success(): Response
    {
        dd("success");
    }

    public function cancle(): Response
    {
        dd("cancel");
    }
}
