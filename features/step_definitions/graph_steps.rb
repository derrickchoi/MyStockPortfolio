Then /^6 months should be the default range$/ do
	beforeNumTicks = (page.all ".axis--x>.tick").size
	click_button("6 months")
	expect(beforeNumTicks).to eq(beforeNumTicks)
end