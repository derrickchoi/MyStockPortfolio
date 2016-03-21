Feature: Search
	In order to use the site
	I need to be able to search for tickers
	Scenario: Searching for apple
		Given I am on the dashboard page
		When I enter the ticker ap
		Then I should have the table stock-list
		And I should see the text Apple on the table 
		And I should also see the text AAPL on the table