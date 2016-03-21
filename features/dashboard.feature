Feature: Dashboard
	In order to use the application
	As a user
	Every widget needs to be present on the Dashboard
	Scenario: Seeing the Dashboard
		Given I am on the dashboard page
		Then I should see the Search widget
		And I should see the Graph widget
		And I should see the legend widget
		And I should see the buy/sell widget
		And I should see the csv File Import widget
		And I should see the account balance widget
		And I should see the User Manual widget
		And I should see the watchlist widget
		And I should see the portfolio widget
		And I should see the date/time widget
		And I should see the detailed info widget