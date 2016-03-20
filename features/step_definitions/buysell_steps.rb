Given /^the market is open$/ do
	time = Time.new
	expect(time.localtime.hour >= 6 && time.localtime.min >= 30 && time.localtime.hour < 13).to be(true)
end