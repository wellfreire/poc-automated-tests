<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Behat\Hook\Scope\AfterScenarioScope;

/**
 * Defines application features from the specific context.
 */
class UIContext extends Behat\MinkExtension\Context\MinkContext implements Context, SnippetAcceptingContext
{
    private $numberIndex = 0;

     /** @BeforeScenario */
    public function before(BeforeScenarioScope $scope)
    {
        $this->getSession()->visit('http://poc-automated-tests.dev/');
        // $this->getSession()->getDriver()->resizeWindow(1300, 700, 'current');
    }

    /** @AfterScenario */
    public function after(AfterScenarioScope $scope)
    {
        $this->getSession()->stop();
    }

    /**
     * @Given I have supplied number :number
     */
    public function iHaveSuppliedNumber($number)
    {
        $this->numberIndex++;
        $this->getSession()->getPage()
            ->findById("number-".$this->numberIndex)
            ->setValue($number);
    }

    /**
     * @When I ask for their sum
     */
    public function iAskForTheirSum()
    {
        $this->getSession()->getPage()
            ->findById("btn-result")
            ->click();
    }

    /**
     * @Then the result should be :result
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
