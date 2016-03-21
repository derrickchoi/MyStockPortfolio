Then /^I should see the (.*) widget$/ do |widget_name|
	if widget_name == 'Search'
		expect(page).to have_content 'Search'
	elsif widget_name == 'csv File Import'
		expect(page).to have_content '.csv Import'
	elsif widget_name == 'Graph'
		expect(page).to have_content 'March' #graph shows up
	elsif widget_name ==  'date/time'
		expect(page).to have_content '(EST)'
	elsif widget_name ==  'account balance'
		expect(page).to have_content 'Account balance:'
	elsif widget_name == 'user manual'
		expect(page).to have_link 'User Manual'
	elsif widget_name == 'watchlist'
		expect(page).to have_content 'Your Watchlist'
	elsif widget_name == 'portfolio'
		expect(page).to have_content 'Your Portfolio'
	elsif widget_name == 'buy/sell'
		expect(page).to have_content 'Buy'
	elsif widget_name == 'legend'
		expect(page.evaluate_script('document.getElementById("legend");')).to be_truthy
	elsif widget_name == 'detailed info'
		expect(page).to have_content 'Detailed Information'
	end
end