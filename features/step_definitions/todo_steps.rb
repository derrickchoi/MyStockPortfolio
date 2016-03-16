Given /^I am on the login page$/ do
	visit "http://localhost/mystockportfolio/index.php"
end
When /^I enter the email (.*)$/ do |email|
	fill_in('Email address' with: email)
end
When /^I enter the password (.*)$/ do |password|
	fill_in('Password' with: password)
end
When /^I click on the button (.*)$/ do |link|
    click_button(link)
end
Then /^I should be forwarded to the Dashboard View$/ do
	pending # express the regexp above with the code you wish you had
end