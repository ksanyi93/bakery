<?php

namespace App\Http\Controllers;

use App\Services\ProductionCapacityService;

class ProductionController extends Controller
{
    protected $productionService;
    
    public function __construct(ProductionCapacityService $productionService)
    {
        $this->productionService = $productionService;
    }
    
    public function maximumProduction()
    {
        $maxProduction = $this->productionService->calculateMaxProduction();
        
        arsort($maxProduction);
        
        return view('maximum-production', [
            'maxProduction' => $maxProduction
        ]);
    }
}