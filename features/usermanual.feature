Feature: User Manual
	Scenario: The user manual link exists
		Given I am on the dashboard page
		Then I should have a user manual href link
	Scenario: The user manual link works
		Given I am at the user manual page
