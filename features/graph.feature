Feature: Graph
	In order to view my stock information
	As a user
	I need to see a graph of the stocks I own and the stocks that I follow
	Scenario: Graph Buttons
		Given I am on the dashboard page
		Then I should see the button 1 day
		Then I should see the button 5 day
		Then I should see the button 1 month
		Then I should see the button 3 months
		Then I should see the button 6 months
		Then I should see the button All Time
	Scenario: Graph Axes
		Given I am on the dashboard page
		Then I should have 2 of .axis selector
		Then I should have 1 of .axis--x selector
		Then I should have 1 of .axis--y selector
	Scenario: Graph Background Color	
		Given I am on the dashboard page
        Then I should see a rgba(255, 255, 255, 1) value for css background-color of selector svg
    Scenario: Graph Axes Color
    	Given I am on the dashboard page
    	Then I should see a rgb(34, 34, 34) value for css stroke of all selector .axis
    	Then I should see a rgb(34, 34, 34) value for css stroke of all selector .domain
    Scenario: Graph Line Colors Different
    	Given I am on the dashboard page
    	Then I should see one of ["rgb(255, 0, 0)", "rgb(0, 0, 255)", "rgb(255, 255, 0)", "rgb(255, 165, 0)"] values for css stroke of all selector .line
	Scenario: Graph Axes Text
		Given I am on the dashboard page
		Then I should see the text Time for selector .axis-label--x
		Then I should see the text Price ($) for selector .axis-label--y