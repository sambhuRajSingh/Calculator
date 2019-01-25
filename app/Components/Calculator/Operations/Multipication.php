<?php 

namespace App\Components\Calculator\Operations;

use App\Components\Calculator\Contracts\Calculatable;

class Multipication implements Calculatable
{
    public function calculate(array $numbers = [])
    {
        $result = $numbers[0];

        for ($i = 1; $i < count($numbers); $i++) {
            $result *= $numbers[$i];
        
        };

        return $result;
    }
}
