<?php 

namespace App\Components\Calculator;

use \Exception;

class OperatorFactory
{
    /**
     * Make a Operations class such as "Addition", "Subtraction" based on
     * string value provided 'addition', 'subtraction'
     *
     * @param $operator String operator type for e.g. 'addition', 'subtraction'
     * 
     * @return \App\Components\Operations\*.php
     * @throws Exception
     */
    public function make(String $operator)
    {
        $operatorClass = ucfirst(strtolower($operator));

        $operatorClass = __NAMESPACE__ . '\\Operations\\' . $operatorClass;

        if (class_exists($operatorClass)) {
            return new $operatorClass();
        } else {
            throw new Exception("Invalid operate type provided.");
        }
    } 
}
