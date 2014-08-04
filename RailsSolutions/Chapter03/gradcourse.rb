class GradCourse < Course 
  def initialize(dept, number, name, professor, semester) 
    @dept = dept 
    @number = number 
    @name = name 
    @professor = professor 
    @semester = semester 
  end 

  def find_all_fall_semester 
    # ...
  end 

  def to_s 
    super + " [Offered in [#@semester]]" 
  end 
end 
