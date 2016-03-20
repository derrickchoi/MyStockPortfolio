Given /^I am on the login page$/ do
	visit "http://localhost/mystockportfolio/index.php"
end
When /^I enter the email (.*)$/ do |email|
	fill_in('Email address', with: email)
end
When /^I enter the password (.*)$/ do |password|
	fill_in('Password', with: password)
end
When /^I click on the button (.*)$/ do |butt|
    click_button(butt)
end
Then /^I should be forwarded to the Dashboard View$/ do
	pending
end

Given /^I am on the dashboard page$/ do
	if !page.has_link?('Logout')
		visit "http://localhost/mystockportfolio/index.php"
		fill_in('Email address', with: 'udubey@usc.edu')
		fill_in('Password', with: 'temporary')
		click_button('Login')
	end
end
When /^I click on the link (.*)$/ do |link|
	click_link(link)
end
Then /^I should be forwarded to the Login View$/ do
	pending
end
