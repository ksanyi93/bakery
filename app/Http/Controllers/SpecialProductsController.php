<?php

namespace App\Http\Controllers;

use App\Services\SpecialProductsService;

class SpecialProductsController extends Controller
{
    protected $specialProductsService;

    public function __construct(SpecialProductsService $specialProductsService)
    {
        $this->specialProductsService = $specialProductsService;
    }

    public function specialProducts()
    {
        $glutenFree = $this->specialProductsService->getGlutenFreeProducts();
        $lactoseFree = $this->specialProductsService->getLactoseFreeProducts();
        $bothFree = $this->specialProductsService->getGlutenAndLactoseFreeProducts();

        return view('special-products', [
            'glutenFree' => $glutenFree,
            'lactoseFree' => $lactoseFree,
            'bothFree' => $bothFree
        ]);
    }
}