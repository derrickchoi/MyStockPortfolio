Feature: Account Management
    In order to use the site
    As a user
    I need to be able to login and logout
    Scenario: Logging in
        Given I am on the login page
        When I enter the email udubey@usc.edu
        And I enter the password temporary
        And I click on the button Login
        Then I should be forwarded to the Dashboard View
    Scenario: Logging out
    	Given I am on the dashboard page
    	When I click on the link Logout
    	Then I should be forwarded to the Login View