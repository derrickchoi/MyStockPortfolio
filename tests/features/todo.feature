Feature: Todo
    In order to use the site
    As a user
    I want to be able to submit, view and delete to-do list items
    Scenario: New item
        Given I am on the home page
        When I click on New Item
        And I fill in the item
        And I click the button Submit
        Then I should see the new item added to the list