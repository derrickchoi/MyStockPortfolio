When /^I enter the ticker (.*)$/ do |ticker|
	fill_in('searchStock', with: ticker)
end
Then /^I should have the table stock-list$/ do
	expect(page).to have_table 'stock-list'
end
And /^I should see the text (.*) on the table$/ do |stock|
	expect(page).to have_css("stock-list", text: (stock))
end
And /^I should also see the text (.*) on the table$/ do |stock|
	expect(page).to have_css("stock-list", text: (stock))
end


