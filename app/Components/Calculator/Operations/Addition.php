<?php 

namespace App\Components\Calculator\Operations;

use App\Components\Calculator\Contracts\Calculatable;

class Addition implements Calculatable
{
    public function calculate(array $numbers = [])
    {
        return array_sum($numbers);
    }
}
