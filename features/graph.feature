Feature: Graph
	In order to view my stock information
	As a user
	I need to see a graph of the stocks I own and the stocks that I follow
	Scenario: Graph Buttons Six
		Given I am on the dashboard page
		Then I should see the button 1 day
		Then I should see the button 5 day
		Then I should see the button 1 month
		Then I should see the button 3 months
		Then I should see the button 6 months
		Then I should see the button All Time
	Scenario: Graph Axes X and Y
		Given I am on the dashboard page
		Then I should have 2 of .axis selector
		Then I should have 1 of .axis--x selector
		Then I should have 1 of .axis--y selector
	Scenario: Graph Background Color White
		Given I am on the dashboard page
		Then I should see a rgba(255, 255, 255, 1) value for css background-color of selector svg
	Scenario: Graph Axes Color #222
		Given I am on the dashboard page
		Then I should see a rgb(34, 34, 34) value for css stroke of all selector .axis
		Then I should see a rgb(34, 34, 34) value for css stroke of all selector .domain
	Scenario: Graph Line Colors Red/Blue/Orange/Yellow
		Given I am on the dashboard page
		Then I should see one of ["rgb(255, 0, 0)", "rgb(0, 0, 255)", "rgb(255, 255, 0)", "rgb(255, 165, 0)"] values for css stroke of all selector .line
	Scenario: Graph Axes Text Price and Time
		Given I am on the dashboard page
		Then I should see the text Time for selector .axis-label--x
		Then I should see the text Price ($) for selector .axis-label--y
	Scenario: Graph Portfolio/Watchlist Buttons
		Given I am on the dashboard page
		Then I should see the button Portfolio
		Then I should see the button Watchlist
	Scenario: Graph Legend
		Given I am on the dashboard page
		Then I should see the table legend