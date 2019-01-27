<?php

namespace App\Http\Controllers;

use App\Components\Calculator\Calculator;
use App\Http\Requests\CalculatorRequest;
use App\Components\Calculator\OperatorFactory;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    /**
     * Instance of a calculator class.
     *
     * @return App\Components\Calculator\Calculator
     */
    private $calculator;

    /**
     * Instance of a operation factory.
     *
     * @return App\Components\Calculator\OperatorFactory
     */
    private $operatorFactory;

    /**
     *
     * @param $calculator App\Components\Calculator\Calculator Instance of calculator.
     * @param $operatorFactory App\Components\Calculator\OperatorFactory Instance of OperatorFactory.
     *
     * @return void
     */
    public function __construct(Calculator $calculator, OperatorFactory $operatorFactory)
    {
        $this->calculator = $calculator;
        $this->operatorFactory = $operatorFactory;
    }

    /**
     * Displays the initial calculator view.
     * 
     * @return Response
     */
    public function index()
    {
        return view('calculator.index');
    }

    /**
     * Handles the form submission to calculate number.
     *
     * @param $calculatorRequest App\Http\Requests\CalculatorRequest Instance of Calculator request.
     */
    public function calculate(CalculatorRequest $calculatorRequest)
    {
        //In case strict check is used.
        $numbers = array_map('floatval', $calculatorRequest['numbers']);

        try {
            $operatorClass = $this->operatorFactory->make($calculatorRequest['operation']);

            $this->calculator->setNumbers($numbers);
            $this->calculator->setOperation($operatorClass);
            $result = $this->calculator->process();

            return redirect()->back()->with('result', $result);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
