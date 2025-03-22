<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BakerySeeder extends Seeder
{
    public function run()
    {
        $json = File::get(storage_path('app/data.json'));
        $data = json_decode($json, true);

        foreach ($data['recipes'] as $recipe) {
            $recipeId = DB::table('recipes')->insertGetId([
                'name' => $recipe['name'],
                'price' => intval(str_replace(' Ft', '', $recipe['price'])),
                'lactose_free' => $recipe['lactoseFree'],
                'gluten_free' => $recipe['glutenFree'],
            ]);

            foreach ($recipe['ingredients'] as $ingredient) {
                $ingredientId = DB::table('ingredients')->where('name', $ingredient['name'])->value('id');

                if (!$ingredientId) {
                    $ingredientId = DB::table('ingredients')->insertGetId([
                        'name' => $ingredient['name'],
                    ]);
                }

                DB::table('recipe_ingredient')->insert([
                    'recipe_id' => $recipeId,
                    'ingredient_id' => $ingredientId,
                    'amount' => $ingredient['amount'],
                ]);
            }
        }

        foreach ($data['inventory'] as $item) {
            DB::table('inventory')->insert([
                'name' => $item['name'],
                'amount' => $item['amount'],
            ]);
        }

        foreach ($data['salesOfLastWeek'] as $sale) {
            DB::table('sales_of_last_week')->insert([
                'name' => $sale['name'],
                'amount' => $sale['amount'],
            ]);
        }

        foreach ($data['wholesalePrices'] as $price) {
            DB::table('whole_sale_prices')->insert([
                'name' => $price['name'],
                'amount' => $price['amount'],
                'price' => $price['price'],
            ]);
        }
    }
}