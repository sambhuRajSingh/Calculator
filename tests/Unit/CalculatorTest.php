<?php

namespace Tests\Unit;

use App\Components\Calculator\Operations\Addition;
use App\Components\Calculator\Calculator;
use App\Components\Calculator\Operations\Division;
use App\Components\Calculator\Operations\Multipication;
use App\Components\Calculator\Operations\Subtraction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * Calculates the addition of array values.
     *
     * @test
     * @dataProvider additionCalculationProvider
     * @return void
     */
    public function calculate_the_addition_of_array_values(array $numbers, float $expectedResult)
    {
        $calculator = new Calculator();
        $calculator->setNumbers($numbers);
        $calculator->setOperation(new Addition);

        $this->assertEquals($expectedResult, $calculator->process());
    }

    /**
     * Calculates the subtract of values of an array from left to right.
     *
     * @test
     * @dataProvider subtractionCalculationProvider
     * @return void
     */
    public function calulates_the_subtraction_of_array_values(array $numbers, float $expectedResult)
    {
        $calculator = new Calculator();
        $calculator->setNumbers($numbers);
        $calculator->setOperation(new Subtraction);

        $this->assertEquals($expectedResult, $calculator->process());
    }

    /**
     * Calculates the multipication of values of an array from left to right.
     *
     * @test
     * @dataProvider multipicationCalculationProvider
     * @return void
     */
    public function calulates_the_multipication_of_array_values(array $numbers, float $expectedResult)
    {
        $calculator = new Calculator();
        $calculator->setNumbers($numbers);
        $calculator->setOperation(new Multipication);

        $this->assertEquals($expectedResult, $calculator->process());
    }

    /**
     * Calculates the division of values of an array from left to right.
     *
     * @test
     * @dataProvider divisionCalculationProvider
     * @return void
     */
    public function calulates_the_division_of_array_values(array $numbers, float $expectedResult)
    {
        $calculator = new Calculator();
        $calculator->setNumbers($numbers);
        $calculator->setOperation(new Division);

        $this->assertEquals($expectedResult, $calculator->process());
    }

    /**
     * Addition Calculation Provider.
     *
     * @return array
     */
    public function additionCalculationProvider()
    {
        return [
            [[2, 2], 4],
            [[2, 2, 5], 9],
            [[2, 2, 5, 1, 1], 11],
            [[2, -2], 0],
            [[-2, -2], -4],
            [[-6, 8], 2]
        ];
    }

    /**
     * Subtraction Calculation Provider.
     *
     * @return array
     */
    public function subtractionCalculationProvider()
    {
        return [
            [[4, 2], 2],
            [[4, 2, 1], 1],
            [[2, 4], -2],
            [[-2, 4], -6],
            [[-2, -4], 2], //-2 -(-4) > -2 +4 > 2
            [[-2, -4, 6], -4]
        ];
    }

    /**
     * Multipication Calculation Provider.
     *
     * @return array
     */
    public function multipicationCalculationProvider()
    {
        return [
            [[4, 2], 8],
            [[4, 2, 1, 2], 16],
            [[4, 2, 0, 2], 0],
            [[4, -2], -8],
            [[-4, -2], 8],
            [[-4, -2, 2], 16],
            [[-4, 2, 2], -16],
        ];
    }

    /**
     * Division Calculation Provider.
     *
     * @return array
     */
    public function divisionCalculationProvider()
    {
        return [
            [[4, 2], 2],
            [[8, 4, 2], 1],
            [[32, 4, 2, 2], 2],
            [[2, 4], 0.5], 
            [[2, 4, 4], 0.125],
            [[4, -2], -2],
            [[-4, -2], 2]
        ];
    }
}
