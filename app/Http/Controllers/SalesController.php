<?php

namespace App\Http\Controllers;

use App\Services\SalesOfLastWeekService;
use App\Services\IngredientCostService;

class SalesController extends Controller
{
    protected $salesService;
    protected $costService;
    
    public function __construct(SalesOfLastWeekService $salesService, IngredientCostService $costService)
    {
        $this->salesService = $salesService;
        $this->costService = $costService;
    }
    
    public function lastWeekRevenue()
    {
        $revenue = $this->salesService->getLastWeekRevenue();
        $formattedRevenue = number_format($revenue, 0, ',', ' ');
        
        return view('last-week-revenue', [
            'formattedRevenue' => $formattedRevenue
        ]);
    }
    
    public function lastWeekProfit()
    {
        $revenue = $this->salesService->getLastWeekRevenue();
        $cost = $this->costService->getLastWeekIngredientCost();
        $profit = $revenue - $cost;
        
        $formattedRevenue = number_format($revenue, 0, ',', ' ');
        $formattedCost = number_format($cost, 0, ',', ' ');
        $formattedProfit = number_format($profit, 0, ',', ' ');
        
        return view('last-week-profit', [
            'profit' => $profit,
            'formattedRevenue' => $formattedRevenue,
            'formattedCost' => $formattedCost,
            'formattedProfit' => $formattedProfit
        ]);
    }
}