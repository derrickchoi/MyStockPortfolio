When /^I click on the button (.*)$/ do |butt|
    click_button(butt)
end
Then /^I should be forwarded to the Dashboard View$/ do
	expect(page).to have_link('Logout')
end

Given /^I am on the dashboard page$/ do
	visit 'http://localhost/mystockportfolio/index.php'
	if !page.has_link?('Logout')
		fill_in('Email address', with: 'udubey@usc.edu')
		fill_in('Password', with: 'temporary')
		click_button('Login')
	end
end
When /^I click on the link (.*)$/ do |link|
	click_link(link)
end
Then /^I should see the textfield (.*)$/ do |field|
	expect(page).to have_field(field)
end
Then /^I should see the button (.*)$/ do |butt|
	expect(page).to have_button(butt)
end