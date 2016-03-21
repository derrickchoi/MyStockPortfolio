Then /^I should have a user manual href link$/ do
	expect(page).to have_link 'User Manual', href:'views/user_manual.pdf'
end
Given /^I am at the user manual page$/ do
	visit 'http://localhost/mystockportfolio/views/user_manual.pdf'
end
