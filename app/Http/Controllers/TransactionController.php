<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function show(Transaction $transaction): Response
    {
        if (Auth::user() && Auth::user()->role === "admin") {
            $isAdmin = true;
        } else {
            $isAdmin = false;
        }

        $transaction = $transaction->load('resources.resourceable')->toArray();

        return Inertia::render("Transactions/Show", [
            "transaction" => $transaction,
            "isAdmin" => $isAdmin,
        ]);
    }
}
