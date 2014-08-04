class Course 
  def initialize(dept, number, name, professor) 
    @dept = dept 
    @number = number 
    @name = name 
    @professor = professor 
  end 

  def to_s 
    "Course Information: #@dept #@number - #@name [#@professor]" 
  end 

  def self.find_all_students 
    #... 
  end 
end 
 
