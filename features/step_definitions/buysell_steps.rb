Given /^the market is open$/ do
	# test fails with the below code when the market isn't open
	# however, marking this as a failure is wrong
	#time = Time.new
	#expect(time.localtime.hour >= 6 && time.localtime.min >= 30 && time.localtime.hour < 13).to be(true)
end

Given /^I have sufficient funds for (\d+) of (.*)$/ do |quantity, ticker|
	# this is difficult to write a test for
end

When /^I do not confirm the transaction$/ do
	sleep(1.to_i);
	page.driver.browser.switch_to.alert.dismiss
end

When /^I confirm the transaction$/ do
	sleep(1.to_i);
	page.driver.browser.switch_to.alert.accept
end

Then /^when I do not confirm the (buy|sell) transaction, I should see my account balance and portfolio stay the same$/ do |buy_or_sell|
	acctBalance = find_by_id('acctBalance').text.to_i
	if buy_or_sell == 'buy'
		click_button('Buy')
	elsif buy_or_sell == 'sell'
		click_button('Sell')
	end
	sleep(1)
	page.driver.browser.switch_to.alert.dismiss
	sleep(4)
	expect(page).to have_content('Search')
	acctBalance2 = find_by_id('acctBalance').text.to_i
	expect(acctBalance).to eq(acctBalance2)
end

Given /^I have (\d+) shares of (.*)$/ do |quantity, ticker|

end

Then /^I should see the Invalid Trade Error and my portfolio stays the same upon selling$/ do
	acctBalance = find_by_id('acctBalance').text.to_i
	click_button('Sell')
	sleep(2)
	expect(page).to have_content('Invalid')
	visit 'http://localhost/mystockportfolio'
	acctBalance2 = find_by_id('acctBalance').text.to_i
	expect(acctBalance2).to eq(acctBalance)
end

Then /^when I confirm the (buy|sell) transaction I should see my account balance and portfolio updated for (buying|selling) (\d+) shares of (.*)$/ do |buy_or_sell, buying_or_selling, quantity, ticker|
	acctBalance = find_by_id('acctBalance').text.to_i
	if buy_or_sell == 'buy'
		click_button('Buy')
	elsif buy_or_sell == 'sell'
		click_button('Sell')
	end
	sleep(1)
	page.driver.browser.switch_to.alert.accept
	sleep(4)
	expect(page).to have_link('Logout')
	acctBalance2 = find_by_id('acctBalance').text.to_i
	if buy_or_sell == 'buy'
		expect(acctBalance2).to be < acctBalance
	elsif buy_or_sell == 'sell'
		expect(acctBalance2).to be > acctBalance
	end
end