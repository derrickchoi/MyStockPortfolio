Then /^I should see all the widgets$/ do
	expect(page).to have_content 'Search'
	expect(page).to have_content '.csv Import'
	expect(page).to have_content 'Detailed Information'
	#expect(page).to have_
end