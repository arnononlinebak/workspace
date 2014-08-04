class ClassifiedController < ApplicationController
  def list
    @classifieds = Classified.find(:all) 
  end
  
  def show 
    @classified = Classified.find(params[:id]) 
  end 
  
  def new 
    @classified = Classified.new
    @categories = Category.find(:all) 
  end 
  
  def create 
    @classified = Classified.new(params[:classified]) 
    if @classified.save 
      redirect_to home_url 
    else 
      render :action => 'new' 
    end 
  end 

  def edit 
    @classified = Classified.find(params[:id]) 
    @categories = Category.find(:all) 
  end 

  def update 
    @classified = Classified.find(params[:id]) 
    if @classified.update_attributes(params[:classified]) 
      redirect_to :action => 'show', :id => @classified 
    else 
      render :action => 'edit' 
    end 
  end 

  def delete 
    Classified.find(params[:id]).destroy 
    redirect_to :action => 'list' 
  end 
  
  def search 
  @classifieds = Classified.find(:all, :conditions => ["lower(title) like ?", "%" + params[:search].downcase + "%"]) 
  if @classifieds.size > 0 
    render :partial => 'classified', :collection => @classifieds 
  else 
    render :text => "<li>No results found</li>", :layout => false 
  end 
  end 

  def contact 
    @classified = Classified.find(params[:id]) 
    ClassifiedMailer.deliver_contact(@classified,params[:contact]) 
    return if request.xhr? 
    render :nothing => true 
  end 

end
