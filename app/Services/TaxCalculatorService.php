<?php

namespace App\Services;
class TaxCalculatorService
{
    public function calculateTax($income)
    {
        if ($income <= 15000) {
            return 0;
        } else {
            return ($income - 15000) * 0.2;
        }
    }
}