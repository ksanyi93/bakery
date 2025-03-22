<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SpecialProductsService
{
    public function getGlutenFreeProducts()
    {
        return DB::table('recipes')
            ->where('gluten_free', 1)
            ->where('lactose_free', 0)
            ->select('name', 'price')
            ->get();
    }

    public function getLactoseFreeProducts()
    {
        return DB::table('recipes')
            ->where('lactose_free', 1)
            ->where('gluten_free', 0)
            ->select('name', 'price')
            ->get();
    }

    public function getGlutenAndLactoseFreeProducts()
    {
        return DB::table('recipes')
            ->where('gluten_free', 1)
            ->where('lactose_free', 1)
            ->select('name', 'price')
            ->get();
    }
}