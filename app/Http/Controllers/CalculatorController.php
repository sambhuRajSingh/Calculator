<?php

namespace App\Http\Controllers;

use App\Components\Calculator\Operations\Addition;
use App\Components\Calculator\Calculator;
use App\Components\Calculator\Operations\Division;
use App\Components\Calculator\Operations\Multipication;
use App\Components\Calculator\Operations\Subtraction;
use App\Http\Requests\CalculatorValidation;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    private $calculator;

    /**
     * TO DO Use interface (Calculatable using a service provider)
     */
    public function __construct(Calculator $calculator)
    {
        $this->calculator = $calculator;
    }

    public function index()
    {
        return view('calculator.index');
    }

    public function calculate(CalculatorValidation $request)
    {
        $numbers = $request['numbers'];

        //Can be used if strict is used
        $numbers = array_map('floatval', $numbers);

        switch ($request['operation']) {
            case 'addition':
                $this->calculator->setNumbers($numbers);
                $this->calculator->setOperation(new Addition);
                $result = $this->calculator->process(); 
                break;
            case 'subtraction':
                $this->calculator->setNumbers($numbers);
                $this->calculator->setOperation(new Subtraction);
                $result = $this->calculator->process(); 
                
                break;
            case 'multipication':
                $this->calculator->setNumbers($numbers);
                $this->calculator->setOperation(new Multipication);
                $result = $this->calculator->process();
                break;
            case 'division':
                $this->calculator->setNumbers($numbers);
                $this->calculator->setOperation(new Division);
                $result = $this->calculator->process(); 
                break;
            
            default:
                dd('invalid operation');
                break;
        }

        return redirect()->back()->with('result', $result);
    }
}
