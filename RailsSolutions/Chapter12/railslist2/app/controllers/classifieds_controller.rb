class ClassifiedsController < ApplicationController
  before_filter :login_required, :only => [:edit, :update, :new, :create, :destroy] 
  
  def index
    list
    render :action => 'list'
  end

  # GETs should be safe (see http://www.w3.org/2001/tag/doc/whenToUseGet.html)
  verify :method => :post, :only => [ :destroy, :create, :update ],
         :redirect_to => { :action => :list }

  def list
    @classified_pages, @classifieds = paginate :classifieds, :per_page => 10
  end

  def show
    @classified = Classified.find(params[:id])
  end

  def new
    @classified = Classified.new
  end

  def create
    @classified = Classified.new(params[:classified])
    @classified.tag_with(params[:tag_list]) 
    if @classified.save
      flash[:notice] = 'Classified was successfully created.'
      redirect_to :action => 'list'
    else
      render :action => 'new'
    end
  end

  def edit
    @classified = Classified.find(params[:id])
  end

  def update
    @classified = Classified.find(params[:id])
    if @classified.update_attributes(params[:classified])
      flash[:notice] = 'Classified was successfully updated.'
      redirect_to :action => 'show', :id => @classified
    else
      render :action => 'edit'
    end
  end

  def destroy
    Classified.find(params[:id]).destroy
    redirect_to :action => 'list'
  end
  
  def tag 
    @tag = Tag.find_by_id(params[:id]).tagged 
  end 
  
end
