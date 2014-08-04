fruit  = ['Apple', 'Orange', 'Squash'] 
fruit.each do |f| 
	puts f 
end 

fruit  = ['Apple', 'Orange', 'Squash'] 
fruit.each_with_index do |f,i| 
puts "#{i} is for #{f}" 
end 

fruit  = ['Apple', 'Orange', 'Squash'] 
for i in 0...fruit.length 
puts fruit[i] 
end 
