<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;

/**
 * Defines application features from the specific context.
 */
class DomainModelContext implements Context, SnippetAcceptingContext
{
    /**
     * @var Calculator\Calculator
     */
    private $calculator;

    private $result;

    public function __construct() { }

    /**
     * @Given /^I am on calculator$/
     */
    public function iAmOnCalculator()
    {
        $this->calculator = new Calculator\Calculator();
    }

    /**
     * @Given /^I enter the number (\d+)$/
     */
    public function iEnterTheNumber($number)
    {
        $this->calculator->enterNumber($number);
    }

    /**
     * @Given /^I enter the addition operator$/
     */
    public function iEnterTheAdditionOperator()
    {
        $this->calculator->enterOperator('+');
    }

    /**
     * @When /^I ask for the result$/
     */
    public function iAskForTheResult()
    {
        $this->result = $this->calculator->result();
    }

    /**
     * @Then /^the result should be (\d+)$/
     */
    public function theResultShouldBe($result)
    {
        PHPUnit_Framework_TestCase::assertEquals(
            $result,
            $this->result,
            "The result should be: {$result}"
        );
    }
}
