fruit  = ['Apple', 'Orange', 'Squash'] 
puts fruit[0] 
fruit << 'Corn'
puts fruit[3] 

fruit = { 
:apple => 'fruit', 
:orange => 'fruit', 
:squash => 'vegetable' 
} 
puts fruit[:apple] 
fruit[:corn] = 'vegetable' 
puts fruit[:corn] 
