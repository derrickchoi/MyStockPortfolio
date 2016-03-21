Then /^I have a (.*) button$/ do |button|
	expect(page).to have_button button
end
When /^I click the (.*) button$/ do |button|
	click_button(button)
end
And /^I have the text (.*)$/ do |text|
	expect(page).to have_text(text)
end
Then /^I upload our example csv file$/ do
	attach_file('csvInputFile', '/var/www/html/mystockportfolio/php/csvExample.csv')
end
Then /^I expect my portfolio to have the ticker (.*)$/ do |ticker|
	expect(page).to have_text(ticker)
end