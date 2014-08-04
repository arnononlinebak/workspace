class Person 
  # Generic features 
end 

class Teacher < Person  
  # A Teacher can enroll in a course for a semester as either 
  # a professor or a teaching assistant 
  def enroll(course, semester, role) 
  #  ... 
  end 
end 


class Student < Person 
  # A Student can enroll in a course for a semester 
  def enroll(course, semester) 
  #  ...  
  end 
end 
