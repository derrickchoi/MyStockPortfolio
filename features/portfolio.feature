Feature: Graph
	In order to view my stock information
	As a user
	I need to see a list of the stocks I own
	Scenario: Portfolio Table
		Given I am on the dashboard page
		Then I should see the table portfolio
	Scenario: Portfolio Header Columns Five
		Given I am on the dashboard page
		Then I should have 5 of .portfolio-header-column selector
		Then I should see the text Ticker Name for selector .portfolio-header-row
		Then I should see the text Company Name for selector .portfolio-header-row
		Then I should see the text Shares Owned for selector .portfolio-header-row
		Then I should see the text Current Price for selector .portfolio-header-row
		Then I should see the text Show on Graph for selector .portfolio-header-row
	Scenario: Portfolio Rows Seven
		Given I am on the dashboard page
		Then I should have 7 of .portfolio-row selector
	Scenario: Portfolio Row Each Five Columns
		Given I am on the dashboard page
		Then I should see 5 of selector td inside each .portfolio-row selector