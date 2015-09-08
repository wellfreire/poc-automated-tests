<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Behat\Hook\Scope\AfterScenarioScope;

/**
 * Defines application features from the specific context.
 */
class UIContext extends Behat\MinkExtension\Context\MinkContext implements Context, SnippetAcceptingContext
{
     /** @BeforeScenario */
    public function before(BeforeScenarioScope $scope)
    {
    }

    /** @AfterScenario */
    public function after(AfterScenarioScope $scope)
    {
        $this->getSession()->stop();
    }

    /**
     * @Given /^I am on calculator$/
     */
    public function iAmOnCalculator()
    {
        $this->getSession()->visit('http://poc-automated-tests.dev/');
    }

    /**
     * @Given /^I enter the number (\d+)$/
     */
    public function iEnterTheNumber($number)
    {
        $inputField = $this->getSession()->getPage()
            ->findById("form-calculator")
            ->findField('expression');

        $expression = $inputField->getValue() . $number;

        $inputField->setValue($expression);
    }

    /**
     * @Given /^I enter the addition operator$/
     */
    public function iEnterTheAdditionOperator()
    {
        $inputField = $this->getSession()->getPage()
            ->findById("form-calculator")
            ->findField('expression');

        $expression = $inputField->getValue() . '+';

        $inputField->setValue($expression);
    }

    /**
     * @When /^I ask for the result$/
     */
    public function iAskForTheResult()
    {
        $this->getSession()->getPage()
            ->findById("btn-result")
            ->click();
    }

    /**
     * @Then /^the result should be (\d+)$/
     */
    public function theResultShouldBe($result)
    {
        $resultContent = $this->getSession()->getPage()
            ->findById("result")
            ->getText();

        PHPUnit_Framework_TestCase::assertEquals(
            "Result is: {$result}",
            $resultContent
        );
    }
}
