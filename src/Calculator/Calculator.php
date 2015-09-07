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
    private $numbers;

    private $result;

    public function __construct()
    {
        $this->numbers = [];
    }

    public function enterNumber($number)
    {
        array_push($this->numbers, $number);
    }

    public function sumNumbers()
    {
        $this->result = array_sum($this->numbers);
    }

    public function result()
    {
        return $this->result;
    }
}