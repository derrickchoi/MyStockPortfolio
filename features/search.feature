Feature: Search
	In order to use the site
	I need to be able to search for tickers
	Scenario: Searching for apple
		Given I am on the dashnoard page
		When I enter the ticker ap
		Then I should see it auto filled with apple, aapl