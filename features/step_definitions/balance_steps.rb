Then /^I should be able to view my account balance$/ do
	expect(page).to have_text('Account balance')
end