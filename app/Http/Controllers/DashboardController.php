<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{

    public array $acceptableStatuses = ["completed", "pending"];

    public function show(Request $request): Response
    {
        $requestData = $request->validate([
            "date" => "nullable|string",
        ]);

        $startDate = isset($requestData["date"])
            ? $startDate = Carbon::parse($requestData["date"])->startOfDay()
            : $startDate = Carbon::now("America/New_York")->startOfDay();

        $endDate = $startDate->copy()->addDay();
        $transactions = Transaction::dateBetween($startDate->setTimezone("UTC"), $endDate->setTimezone("UTC"))
            ->status($this->acceptableStatuses);

        return Inertia::render("Dashboard", [
            "date" => $startDate,
            "orderCount" => $transactions->count(),
            "revenue" => doubleval($transactions->sum("transaction_amount")),
            "hourlyOrders" => $this->getHourlyOrders($startDate, $endDate),
            "orders" => $this->getDaliyOrders($startDate, $endDate),
        ]);
    }

    private function getDaliyOrders(Carbon $startDate, Carbon $endDate): array
    {
        $orders = Transaction::dateBetween($startDate->setTimezone("UTC"), $endDate->setTimezone("UTC"))
            ->status($this->acceptableStatuses)
            ->with("user")
            ->get()
            ->map(function ($transaction) {
                return [
                    "id" => $transaction->id,
                    "email" => $transaction->user->email,
                    "status" => $transaction->transaction_status,
                    "amount" => $transaction->transaction_amount,
                    "time" => $transaction->created_at
                ];
            })
        ->toArray();

        return $orders;
    }

    private function getHourlyOrders(Carbon $startDate, Carbon $endDate): array
    {
        $hourlyOrders = Transaction::dateBetween($startDate->setTimezone("UTC"), $endDate->setTimezone("UTC"))
            ->status($this->acceptableStatuses)
            ->get()
            ->map(function ($transaction) {
                $createdAtEST = Carbon::parse($transaction->created_at)->setTimezone("America/New_York");
                return [
                    "hour" => (int) $createdAtEST->format("H"),
                ];
            })
            ->groupBy("hour")
            ->map(fn($group, $hour) => [
                "hour" => (int) $hour,
                "order_count" => $group->count(),
            ])
            ->keyBy("hour")
            ->toArray();

        $ordersArray = collect(range(0, 23))->map(function ($hour) use ($hourlyOrders) {
            return $hourlyOrders[$hour] ?? [
                "hour" => $hour,
                "order_count" => 0,
            ];
        })->toArray();

        return $ordersArray;
    }

}
