ActionController::Routing::Routes.draw do |map|
  map.with_options(:controller => 'classified') do |classified|  
    classified.connect 'classifieds/new', :action => 'new' 
    classified.connect 'classifieds/create', :action => 'create' 
    classified.connect 'classifieds/edit/:id', :action => 'edit' 
    classified.connect 'classifieds/update/:id', :action => 'update' 
    classified.connect 'classifieds/delete/:id', :action => 'delete' 
    classified.connect 'classifieds/categories/:id', :action => 'show_category' 
    classified.connect 'classifieds/:id', :action => 'show' 
    classified.connect '', :action => 'list' 
  end 
  
  map.with_options(:controller => 'category') do |category|      
    category.connect 'categories', :action => 'list' 
    category.connect 'categories/show/:id', :action => 'show' 
  end 
  
  
  map.home '', :controller => 'classified', :action => 'list' 
  map.show 'classifieds/:id', :controller => 'classified', :action => 'list' 
  

  # Allow downloading Web Service WSDL as a file with an extension
  # instead of a file named 'wsdl'
  map.connect ':controller/service.wsdl', :action => 'wsdl'

  # Install the default route as the lowest priority.
  map.connect ':controller/:action/:id'
end
