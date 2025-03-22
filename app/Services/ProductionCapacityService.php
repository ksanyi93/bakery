<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Traits\ConversionTrait;

class ProductionCapacityService
{
    use ConversionTrait;
    public function calculateMaxProduction(): array
    {
        $maxQuantities = [];
        $maxProductionByRecipe = [];

        $recipes = DB::table('recipes')
            ->get();

        foreach ($recipes as $recipe) {
            $recipeIngredients = DB::table('recipe_ingredient')
                ->where('recipe_id', $recipe->id)
                ->get();
           
           
            foreach ($recipeIngredients as $recipeIngredient) {
                $ingredientName = DB::table('ingredients')
                    ->where('id', $recipeIngredient->ingredient_id)
                    ->value('name');
               
                $inventoryItem = DB::table('inventory')
                    ->where('name', $ingredientName)
                    ->first();
               
                if (!$inventoryItem) {
                    $maxQuantities[] = 0;
                    continue;
                }
               
                $recipeAmount = $this->extractNumericValue($recipeIngredient->amount);
                $inventoryAmount = $this->extractNumericValue($inventoryItem->amount);
                $inventoryUnit = $this->extractUnit($inventoryItem->amount);
                $convertedInventoryAmount = $this->convertToBaseUnit($inventoryAmount, $inventoryUnit);
               
                if ($recipeAmount > 0) {
                    $maxQuantities[] = floor($convertedInventoryAmount / $recipeAmount);
                } else {
                    continue;
                }
            }

            $maxProductionByRecipe[$recipe->name] = empty($maxQuantities) ? 0 : min($maxQuantities);
        }
       
        return $maxProductionByRecipe;
    }
}