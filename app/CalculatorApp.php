<?php

/**
* Calculator App
*/
class CalculatorApp
{
    private $calculatorController;

    public function __construct()
    {
        $this->calculatorController = new Calculator\CalculatorController();
    }
    
    public function run()
    {
        return $this->routeRequest();
    }

    private function routeRequest()
    {
        switch ($_SERVER['REQUEST_URI']) {
            case '/result':
                return $this->calculatorController->resultAction();
                break;

            case '':
            default:
                return $this->calculatorController->indexAction();
                break;
        }
    }
}