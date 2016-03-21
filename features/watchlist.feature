Feature: Watchlist
	In order to view the stocks I follow
	As a user
	I need to see a list of the stocks I follow
	Scenario: Watchlist Table
		Given I am on the dashboard page
		Then I should see the table watchlist
	Scenario: Watchlist Header Columns Four
		Given I am on the dashboard page
		Then I should have 4 of .watchlist-header-column selector
		Then I should see the text Remove for selector .watchlist-header-row
		Then I should see the text Ticker Name for selector .watchlist-header-row
		Then I should see the text Company Name for selector .watchlist-header-row
		Then I should see the text Show on Graph for selector .watchlist-header-row
	Scenario: Portfolio Row Each Four Columns
		Given I am on the dashboard page
		Then I should see 4 of selector td inside each .watchlist-row selector