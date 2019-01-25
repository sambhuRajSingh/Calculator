<?php 

namespace App\Components\Calculator;

use App\Components\Calculator\Contracts\Calculatable;

class Calculator
{
    private $numbers;
    
    private $operation;

    public function setNumbers(array $numbers)
    {
        $this->numbers = $numbers;
    }

    public function setOperation(Calculatable $operation) {
        $this->operation = $operation;
    }

    public function process()
    {
        return $this->operation->calculate($this->numbers);
    }
}
