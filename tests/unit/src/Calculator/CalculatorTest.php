<?php

class CalculatorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Calculator\Calculator
     */
    private $calculator;

    public function setUp()
    {
        $this->calculator = new Calculator\Calculator();
    }

    public function tearDown()
    {
        $this->calculator = null;
    }

    /**
     * @dataProvider numbersForSumProvider
     */
    public function testItCanSumTwoNumbersCorrectly($a, $b, $result)
    {
        $this->calculator->enterNumber($a);
        $this->calculator->enterNumber($b);
        $this->calculator->sumNumbers($b);

        $this->assertEquals(
            $result,
            $this->calculator->result(),
            "{$a} plus {$b} should equals to {$result}"
        );
    }

    public function numbersForSumProvider()
    {
        return [
            [-1, -1, -2],
            [-1, 0, -1],
            [0, -1, -1],
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 2],
        ];
    }
}