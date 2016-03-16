Feature: Todo
    In order to use the site
    As a user
    I want to be able to submit, view and delete to-do list items
    Scenario: New item
        Given I am on the login page
        When I enter the email udubey@usc.edu
        And I enter the password temporary
        And I click on the button Login
        Then I should be forwarded to the Dashboard View