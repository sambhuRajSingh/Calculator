<?php

namespace App\Http\Controllers;

use App\Components\Calculator\Operations\Addition;
use App\Components\Calculator\Calculator;
use App\Components\Calculator\Operations\Division;
use App\Components\Calculator\Operations\Multipication;
use App\Components\Calculator\OperatorFactory;
use App\Components\Calculator\Operations\Subtraction;
use App\Http\Requests\CalculatorValidation;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    private $calculator;

    private $operatorFactory;

    /**
     * TO DO Use interface (Calculatable using a service provider)
     */
    public function __construct(Calculator $calculator, OperatorFactory $operatorFactory)
    {
        $this->calculator = $calculator;
        $this->operatorFactory = $operatorFactory;
    }

    public function index()
    {
        return view('calculator.index');
    }

    public function calculate(CalculatorValidation $request)
    {
        //Can be used if strict is used
        $numbers = array_map('floatval', $request['numbers']);

        try {
            $operatorClass = $this->operatorFactory->make($request['operation']);

            $this->calculator->setNumbers($numbers);
            $this->calculator->setOperation($operatorClass);
            $result = $this->calculator->process();

            return redirect()->back()->with('result', $result);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
