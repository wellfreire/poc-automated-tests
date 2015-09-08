<?php

namespace Calculator;

class CalculatorService
{
    /**
     * @var Calculator
     */
    private $calculator;

    public function __construct()
    {
        $this->calculator = new Calculator();
    }

    public function resultOfExpression($expression)
    {
        $entries = str_split($expression);
        $availableOperations = $this->calculator->availableOperations();
        foreach ($entries as $entry) {
            if (is_numeric($entry)) {
                $this->calculator->enterNumber($entry);
                continue;
            }
            if (in_array($entry, $availableOperations)) {
                $this->calculator->enterOperator($entry);
                continue;
            }
            return "Invalid operator [{$entry}] identified.";
        }
        return $this->calculator->result();
    }
}