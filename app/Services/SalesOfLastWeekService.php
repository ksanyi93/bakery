<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SalesOfLastWeekService
{
    public function getLastWeekRevenue(): float|int
    {
        $totalRevenue = 0;
        $sales = DB::table('sales_of_last_week')
            ->get();

        foreach ($sales as $sale) {
            $price = DB::table('recipes')
                ->where('name', $sale->name)
                ->value('price');

            $totalRevenue += $sale->amount * $price;
        }

        return $totalRevenue;
    }
}