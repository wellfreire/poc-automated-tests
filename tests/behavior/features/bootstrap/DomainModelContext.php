<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class DomainModelContext implements Context, SnippetAcceptingContext
{
    /**
     * @var Calculator\Calculator
     */
    private $calculator;

    public function __construct(array $parameters = array())
    {
        if (! isset($this->calculator)) {
           $this->calculator = new Calculator\Calculator();
        }
    }

    /**
     * @Given I have supplied number :number
     */
    public function iHaveSuppliedNumber($number)
    {
        $this->calculator->enterNumber($number);
    }

    /**
     * @When I ask for their sum
     */
    public function iAskForTheirSum()
    {
        $this->calculator->sumNumbers();
    }

    /**
     * @Then the result should be :result
     */
    public function theResultShouldBe($result)
    {
        PHPUnit_Framework_TestCase::assertEquals(
            $result,
            $this->calculator->result(),
            "The result should be: {$result}"
        );
    }
}
