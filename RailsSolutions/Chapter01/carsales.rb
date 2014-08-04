class Vehicle < ActiveRecord::Base 
  belongs_to :customer 
  belongs_to :salesman 
end 

class Salesman < ActiveRecord::Base 
  has_many :vehicles 
end
 
class Customer < ActiveRecord::Base 
  has_many :vehicles 
end