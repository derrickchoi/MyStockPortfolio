Feature: CSV Upload
	Scenario: CSV Upload Exists
		Given I am on the dashboard page
		Then I have a Upload File button
		And I have the text .csv Import
	Scenario: CSV Upload Works
		Given I am on the dashboard page
		When I upload our example csv file
		And I click the Upload File button
		Then I expect my portfolio to have the ticker NFLX