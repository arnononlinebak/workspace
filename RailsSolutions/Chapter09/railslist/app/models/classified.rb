class Classified < ActiveRecord::Base
  validates_presence_of :title 
  validates_presence_of :price 
  validates_presence_of :location 
  validates_presence_of :description 
  validates_presence_of :email 
  validates_numericality_of :price 
  validates_format_of :email, :with => /^([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})$/i
  validates_format_of :content_type, :with => /^image/, :message => "You can only upload pictures" 
  
  belongs_to :category 
  
protected 
  def validate 
    errors.add(:price, "should be a positive value") if price.nil? || price < 0.01 
  end 
  
  def pictureimg=(picture_field) 
    return if picture_field.blank? 
    self.content_type = picture_field.content_type.chomp 
    self.picture = picture_field.read 
  end 
  
end
