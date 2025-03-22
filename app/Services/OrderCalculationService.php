<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Traits\ConversionTrait;

class OrderCalculationService
{
    use ConversionTrait;

    public function calculateOrderCostAndProfit(string $productName, int $quantity): array
    {
        $totalIngredientCost = 0;

        $recipeId = DB::table('recipes')
            ->where('name', $productName)
            ->value('id');

        $recipeIngredients = DB::table('recipe_ingredient')
            ->where('recipe_id', $recipeId)
            ->get();

        $sellingPrice = DB::table('recipes')
            ->where('name', $productName)
            ->value('price');

        foreach ($recipeIngredients as $recipeIngredient) {
            $ingredientName = DB::table('ingredients')
                ->where('id', $recipeIngredient->ingredient_id)
                ->value('name');

            $wholeSaleItem = DB::table('whole_sale_prices')
                ->where('name', $ingredientName)
                ->first();

            $wholeSaleAmount = $this->extractNumericValue($wholeSaleItem->amount);
            $wholeSaleUnit = $this->extractUnit($wholeSaleItem->amount);
            $recipeIngredientAmount = $this->extractNumericValue($recipeIngredient->amount);
            $convertedWholeSaleAmount = $this->convertToBaseUnit($wholeSaleAmount, $wholeSaleUnit);

            $unitPrice = ($convertedWholeSaleAmount > 0) ? $wholeSaleItem->price / $convertedWholeSaleAmount : 0;

            $totalIngredientCost += $quantity * $recipeIngredientAmount * $unitPrice;
        }

        $profit = $sellingPrice * $quantity - $totalIngredientCost;

        return [
            'product' => $productName,
            'quantity' => $quantity,
            'total_ingredient_cost' => round($totalIngredientCost, 2),
            'profit' => round($profit, 2)
        ];
    }

    public function calculateAllSpecifiedCakes(): array
    {
        $results = [];
        $totalIngredientCost = 0;
        $totalProfit = 0;
        
        $cakes = [
            ['name' => 'Francia krémes', 'quantity' => 300],
            ['name' => 'Rákóczi túrós', 'quantity' => 200],
            ['name' => 'Képviselőfánk', 'quantity' => 300],
            ['name' => 'Isler', 'quantity' => 100],
            ['name' => 'Tiramisu', 'quantity' => 150]
        ];
        
        foreach ($cakes as $cake) {
            $data = $this->calculateOrderCostAndProfit($cake['name'], $cake['quantity']);
            
            $results[] = [
                'product_name' => $cake['name'] . ' (' . $cake['quantity'] . ' db)',
                'total_ingredient_cost' => $data['total_ingredient_cost'],
                'profit' => $data['profit']
            ];
            
            $totalIngredientCost += $data['total_ingredient_cost'];
            $totalProfit += $data['profit'];
        }
        
        return [
            'results' => $results,
            'total_ingredient_cost' => $totalIngredientCost,
            'total_profit' => $totalProfit
        ];
    }
}