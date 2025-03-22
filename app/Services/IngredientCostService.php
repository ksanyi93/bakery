<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Traits\ConversionTrait;

class IngredientCostService
{
    use ConversionTrait;
    public function getLastWeekIngredientCost(): float|int
    {
        $totalCost = 0;

        $sales = DB::table('sales_of_last_week')
            ->get();
        
        foreach ($sales as $sale) {
            $recipeId = DB::table('recipes')
                ->where('name', $sale->name)
                ->value('id');
                
            $recipeIngredients = DB::table('recipe_ingredient')
                ->where('recipe_id', $recipeId)
                ->get();
                
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
                
                $totalCost += $sale->amount * $recipeIngredientAmount * $unitPrice;
            }
        }
        
        return $totalCost;
    }
}