class Person < ActiveRecord::Base  
  has_many :brothers  
  has_many  :sister  
  belongs_to :mother  
  belongs_to :father 
end  
