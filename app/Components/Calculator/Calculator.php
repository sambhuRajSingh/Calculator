<?php 

namespace App\Components\Calculator;

use App\Components\Calculator\Contracts\Calculatable;

class Calculator
{
    /**
     * Nubers to be calculated.
     *
     * @var array
     */
    private $numbers;
    
    /**
     * Operation to be performed on numbers.
     *
     * @var \App\Components\Calculator\Contracts\Calculatable
     */
    private $operation;

    /**
     * Set array of numbers to be calculated.
     *
     * @param $numbers array
     *
     * @return void
     */
    public function setNumbers(array $numbers)
    {
        $this->numbers = $numbers;
    }

    /**
     * Set the operation (addition, subtraction) to calculate number.
     * 
     * @param $operate
     *
     * @return void
     */
    public function setOperation(Calculatable $operation)
    {
        $this->operation = $operation;
    }

    /**
     * Caluculate number based on operation set.
     *
     * @return float
     */
    public function process()
    {
        return $this->operation->calculate($this->numbers);
    }
}
