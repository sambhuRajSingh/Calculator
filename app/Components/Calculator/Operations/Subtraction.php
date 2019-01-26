<?php 

namespace App\Components\Calculator\Operations;

use App\Components\Calculator\Contracts\Calculatable;

class Subtraction implements Calculatable
{
    public function calculate(array $numbers = [])
    {
        $result = array_shift($numbers);

        foreach ($numbers as $number) {
            $result -= $number;
        
        };

        return $result;
    }
}
