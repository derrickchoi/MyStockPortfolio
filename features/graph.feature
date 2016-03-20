Feature: Graph
	In order to view my stock information
	As a user
	I need to see a graph of the stocks I own and the stocks that I follow
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