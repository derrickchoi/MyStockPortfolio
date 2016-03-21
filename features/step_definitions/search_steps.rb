When /^I enter the ticker (.*)$/ do |ticker|
	fill_in('searchStock', with: ticker)
end
Then /^I should have the autocomplete list with (.*) first$/ do |ticker|
	exepect first('ui-menu-item').to have_content(ticker)
end
And /^I press enter$/ do
	find('#searchStock').native.send_keys(:return)
end
Then /^I should have a table with data (.*)$/ do |stock|
	expect(page).to have_table("stock-list", text: (stock))
end
Then /^I should get an add to watchlist href$/ do
	expect(page).to have_link 'Add to Watchlist', href: './php/watchlist_add.php?ticker=apple'
end
Then /^I should have a graph button$/ do
	expect(page).to have_button 'Graph'
end