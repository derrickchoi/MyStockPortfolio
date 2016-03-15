Given /^I am on the home page$/ do
	visit "http://localhost/mystockportfolio/index.php"
end
When /^I click on (.*)$/ do |link|
    click_link (link)
end
When /^I fill in the item$/ do
	pending # express the regexp above with the code you wish you had
end
When /^I click the button Submit$/ do
	pending # express the regexp above with the code you wish you had
end
Then /^I should see the new item added to the list$/ do
	pending # express the regexp above with the code you wish you had
end