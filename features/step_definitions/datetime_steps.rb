Then /^I have the date time text (.*)$/ do |text|
	expect(page).to have_text(text)
end