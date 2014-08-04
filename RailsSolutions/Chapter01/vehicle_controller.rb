class VehicleController < ApplicationController 
	def new 
		@car = Car.new(params[:car]) 
		if @car.save 
			redirect_to :controller => "vehicle", :action => "view_all" 
		end 
	end 
	
	def delete 
		@vehicle = Vehicle.find(params[:id]) 
		@vehicle.destroy 
	end 

	def sell 
		@car = Car.find(params[:id]) 
		@salesman = Salesman.find(params[:salesman][:id]) 
		@customer = Customer.find(params[:customer][:id]) 
		@car.customer = @customer 
		@car.salesman = @salesman 
		if @car.update_attributes(params['car']) 
			redirect_to :controller => "vehicle", :action => "view_all" 
		end 
	end 

	def view_all 
		@cars = Vehicle.find(:all) 
	end 
end 
