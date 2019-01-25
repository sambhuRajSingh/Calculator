<?php 

namespace App\Components\Calculator\Contracts;

interface Calculatable
{
    public function calculate(array $numbers = []);
}
