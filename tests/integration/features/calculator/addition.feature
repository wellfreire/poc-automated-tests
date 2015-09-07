Feature: Calculator Sum
    In order I can avoid being an idiot
    As a calculator user
    I need to be able to sum two numbers

    @domain
    Scenario: adding 2 numbers
        Given I have supplied number 2
        And I have supplied number 5
        When I ask for their sum
        Then the result should be 7