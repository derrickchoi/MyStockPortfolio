Feature: Buy/Sell
	In order to manage the portfolio
	As a user
	I need to be able to buy and sell shares while adhering to simple rules
	Scenario: Seeing visual design of buy/sell widget
		Given I am on the dashboard page
		And the market is open
		Then I should see the textfield Ticker Name
		And I should see the textfield Company Name
		And I should see the textfield Quantity
		And I should see the button Buy
		And I should see the button Sell
	Scenario: Not confirming a transaction to cancel it
		Given I am on the dashboard page
		And the market is open
		And I have sufficient funds for 2 of AAPL
		When I enter AAPL for Ticker Name
		And I enter 2 for Quantity
		Then when I do not confirm the buy transaction, I should see my account balance and portfolio stay the same
	Scenario: Executing an invalid sell operation
		Given I am on the dashboard page
		And the market is open
		When I enter bloimschikle for Ticker Name
		And I enter 2 for Quantity
		Then I should see the Invalid Trade Error and my portfolio stays the same upon selling
	Scenario: Attempting to execute a sale with insufficient shares
		Given I am on the dashboard page
		And the market is open
		And I have 0 shares of AMZN
		When I enter AMZN for Ticker Name
		And I enter 2 for Quantity
		Then I should see the Invalid Trade Error and my portfolio stays the same upon selling
	Scenario: Executing a buy operation
		Given I am on the dashboard page
		And the market is open
		And I have sufficient funds for 2 of AAPL
		When I enter AAPL for Ticker Name
		And I enter 2 for Quantity
		Then when I confirm the buy transaction I should see my account balance and portfolio updated for buying 2 shares of AAPL
	Scenario: Executing a sell operation
		Given I am on the dashboard page
		And the market is open
		And I have 2 shares of AAPL
		When I enter 2 for Quantity
		Then when I confirm the sell transaction I should see my account balance and portfolio updated for selling 2 shares of AAPL