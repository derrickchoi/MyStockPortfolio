Feature: Search
	In order to use the site
	I need to be able to search for tickers
	Scenario: Autocomplete for Apple
		Given I am on the dashboard page
		When I enter the ticker ap
		Then I should have the autocomplete list with Apple first
	Scenario: Searching for AAPL should bring a result
		Given I am on the dashboard page
		When I enter the ticker AAPL
		And I press enter
		Then I should have a table with data AAPL display from 9/29 to 2/29 Graph Add to Watchlist
	Scenario: Searching for Apple should bring a result
		Given I am on the dashboard page
		When I enter the ticker Apple
		And I press enter
		Then I should have a table with data Apple display from 9/29 to 2/29 Graph Add to Watchlist
	Scenario: Picking a result you can add to watchlist
		Given I am on the dashboard page
		When I enter the ticker apple
		And I press enter
		Then I should get an add to watchlist href
	Scenario: Picking a result shows it on the graph
		Given I am on the dashboard page
		When I enter the ticker apple
		And I press enter
		Then I should have a graph button