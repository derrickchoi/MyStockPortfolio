Feature: Login
    In order to use the site
    As a user
    I need to be able to register, log in, and retrieve a forgotten password upon visiting the site
    Scenario: Visiting the site
        Given I have a clean session
        When I visit the site
        Then I should be forwarded to the Login View
    Scenario: Logging in with valid credentials
        Given I am on the login page
        When I enter the email udubey@usc.edu
        And I enter the password temporary
        And I click on the button Login
        Then I should be forwarded to the Dashboard View
    Scenario: Logging in with invalid credentials
        Given I am on the login page
        When I enter the email udubey@usc.edu
        And I enter the password foobar
        And I click on the button Login
        Then I should be forwarded to the Login View
    Scenario: Logging out
    	Given I am on the dashboard page
    	When I click on the link Logout
    	Then I should be forwarded to the Login View