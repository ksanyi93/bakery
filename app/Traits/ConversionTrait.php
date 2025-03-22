<?php

namespace App\Traits;

trait ConversionTrait
{
    protected function extractNumericValue($value): float|int
    {
        preg_match('/^([0-9.]+)/', $value, $matches);
        
        if (isset($matches[1])) {
            return floatval($matches[1]);
        }
        
        return 0;
    }
    
    protected function extractUnit($value): string
    {
        preg_match('/([a-zA-Z]+)$/', $value, $matches);
       
        if (isset($matches[1])) {
            return strtolower(trim($matches[1]));
        }
       
        return '';
    }
   
    protected function convertToBaseUnit($amount, $unit): float
    {
        switch ($unit) {
            case 'kg':
                return $amount * 1000;
            case 'l':
                return $amount * 1000;
            default:
                return $amount;
        }
    }
}