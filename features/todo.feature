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
    Scenario: Graph
        Given I am on the login page
        When I enter the email udubey@usc.edu
        And I enter the password temporary
        And I click on the button Login
        Then I should have a 1 day button
        Then I should have a 5 days button
        Then I should have a 1 month button
        Then I should have a 3 months button
        Then I should have a 6 months button
        Then I should have a All Time button
        Then I should have 1 svg css
        Then I should have 3 .line css
        Then I should have 2 .axis css
        Then I should have 1 .axis--x css
        Then I should have 1 .axis--y css
        Then I should see a rgba(255, 255, 255, 1) value for css background-color of type svg