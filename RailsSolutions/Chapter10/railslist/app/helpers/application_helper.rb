# Methods added to this helper will be available to all templates in the application.
module ApplicationHelper
  def can_edit?(classified) 
    if classified.user == session[:user] 
      return true 
    else 
      return false 
    end 
  end 
  
  def logged_in? 
    return true if session[:user] 
    return false
  end 
  
end
