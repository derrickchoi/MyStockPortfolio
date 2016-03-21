Given /^I am on the login page$/ do
	if page.has_link?('Logout')
		click_link('Logout')
	else
		visit "http://localhost/mystockportfolio/index.php"
	end
end
When /^I enter the email (.*)$/ do |email|
	fill_in('Email address', with: email)
end
When /^I enter the password (.*)$/ do |password|
	fill_in('Password', with: password)
end

Then /^I should be forwarded to the Login View$/ do
	expect(page).to have_button('Login')
end

Given /^I have a clean session$/ do
	# just to be extra sure that the session is reset
	visit 'http://localhost'
	Capybara.reset_sessions!
	visit 'http://localhost/mystockportfolio/index.php'
end
When /^I visit the site$/ do
	visit 'http://localhost/mystockportfolio/index.php'
end