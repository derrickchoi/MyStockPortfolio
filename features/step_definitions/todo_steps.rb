Given /^I am on the login page$/ do
	visit "http://localhost/mystockportfolio/index.php"
end
When /^I enter the email (.*)$/ do |email|
	fill_in('Email address', with: email)
end
When /^I enter the password (.*)$/ do |password|
	fill_in('Password', with: password)
end
When /^I click on the button (.*)$/ do |link|
    click_button(link)
end
Then /^I should be forwarded to the Dashboard View$/ do
	pending # express the regexp above with the code you wish you had
end
Then /^I should have a (.*) button$/ do |buttonTitle|
	expect(page).to have_selector :button, buttonTitle
end
Then /^I should have (\d+) (.*) css$/ do |num, type|
	expect(page).to have_css type, count: num
end
Then /^I should see a (.*) value for css (.*) of type (.*)$/ do |value, css, type|
	expect((page.find type).native.css_value(css)).to eq(value)
end