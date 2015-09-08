<?php

namespace Calculator;

/**
 * Calculator
 */
class Calculator
{
    /**
     * @var array
     */
    private $entries;

    public function __construct()
    {
        $this->entries = [];
    }

    public function enterNumber($number)
    {
        array_push($this->entries, $number);
    }

    public function enterOperator($operator)
    {
        array_push($this->entries, $operator);
    }

    public function result()
    {
        $expression = implode('', $this->entries);
        return eval("return ({$expression});");
    }

    public function availableOperations()
    {
        return array('+');
    }
}