<?php

namespace App\Http\Controllers;

use App\Services\OrderCalculationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderCalculationController extends Controller
{
    protected $calculationService;

    public function __construct(OrderCalculationService $calculationService)
    {
        $this->calculationService = $calculationService;
    }

    public function calculateSpecifiedCakes()
    {
        $data = $this->calculationService->calculateAllSpecifiedCakes();
        
        $products = DB::table('recipes')->pluck('name', 'name');
        
        return view('order-specified-cakes', compact('products', 'data'));
    }
}