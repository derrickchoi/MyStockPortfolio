When /^I enter the ticker (.*)$/ do |ticker|
	fill_in('searchStock', with: ticker)
end
Then /^I should see it auto filled with apple, aapl$/ do
	expect(page).to have_content?("ui-id-3")
	expect(page).to have_content?("ui-id-2")
end


