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
		And the market is pen
		And I have sufficient funds for 5 shares of AAPL
		When I enter AAPL for Ticker Name
		And I enter 5 for Quantity
		And I click on the button Buy
		And I do not confirm the purchase
		Then I should see my account balance stay the same
		And I should see my portfolio stay the same
	Scenario: Attempting to execute a sale with insufficient shares
		Given I am on the dashboard page
		And the market is open
		And I have 0 shares of AMZN
		When I enter AMZN for Ticker NAme
		And I enter 5 for Quantity
		And I click on the button Sell
		Then I should see the Invalid Trade Error
		And I should see my portfolio stay the same
	Scenario: Executing a buy operation
		Given I am on the dashboard page
		And the market is open
		And I have sufficient funds for 5 shares of AAPL
		When I enter AAPL for Ticker Name
		And I enter 5 for Quantity
		And I click on the button Buy
		And I confirm the transaction
		Then I should see my account balance updated for selling -5 AAPL
		And I should see -5 shares of AAPL taken from my portfolio
	Scenario: Executing a sell operation
		Given I am on the dashboard page
		And the market is open
		And I have 5 shares of AAPL
		When I enter 5 for Quantity
		And I lick on the button Sell
		And I confirm the transaction
		Then I should see my account balance updated for selling 5 AAPL
		And I should see 5 shares of AAPL taken from my portfolio