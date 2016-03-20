Then /^I should have a (.*) button$/ do |buttonTitle|
	expect(page).to have_selector :button, buttonTitle
end
Then /^I should have (\d+) (.*) selector$/ do |num, selector|
	expect(page).to have_css selector, count: num
end
Then /^I should see a (.*) value for css (.*) of selector (.*)$/ do |value, css, selector|
	expect((page.find selector).native.css_value(css)).to eq(value)
end