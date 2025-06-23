<?php

namespace App\Services;

class SimpleInterestService
{

    public function calculateInt(float $principal, float $rate, float $time): float
    {
        if ($principal > 0 && $rate > 0 && $time > 0) {
            return ($principal * $rate * $time) / 100;
        }

        return 0.0;
    }
}