begin 
	@user = User.find(1) 
	@user.name 
rescue 
	STDERR.puts "A bad error occurred" 
end 
