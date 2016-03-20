Given /^I am on the dashboard page$/ do
	visit 'http://localhost/mystockportfolio/index.php'
	if !page.has_link?('Logout')
		fill_in('Email address', with: 'udubey@usc.edu')
		fill_in('Password', with: 'temporary')
		click_button('Login')
	end
end

When /^I enter the ticker (.*)$/ do |ticker|
	fill_in('searchStock', with: ticker)
end
Then /^I should see it auto filled with apple, aapl$/ do
	expect(page).to have_content?("ui-id-3")
	expect(page).to have_content?("ui-id-2")
end


