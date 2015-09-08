Feature: Calculator Sum
    In order I can avoid being an idiot
    As a calculator user
    I need to be able to sum two numbers

    @domain
    @ui @javascript
    Scenario: adding 2 numbers
        Given I am on calculator
        And I enter the number 2
        And I enter the addition operator
        And I enter the number 5
        When I ask for the result
        Then the result should be 7