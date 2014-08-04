require File.dirname(__FILE__) + '/../test_helper'
require 'classifieds_controller'

# Re-raise errors caught by the controller.
class ClassifiedsController; def rescue_action(e) raise e end; end

class ClassifiedsControllerTest < Test::Unit::TestCase
  fixtures :classifieds

  def setup
    @controller = ClassifiedsController.new
    @request    = ActionController::TestRequest.new
    @response   = ActionController::TestResponse.new
  end

  def test_index
    get :index
    assert_response :success
    assert_template 'list'
  end

  def test_list
    get :list

    assert_response :success
    assert_template 'list'

    assert_not_nil assigns(:classifieds)
  end

  def test_show
    get :show, :id => 1

    assert_response :success
    assert_template 'show'

    assert_not_nil assigns(:classified)
    assert assigns(:classified).valid?
  end

  def test_new
    get :new

    assert_response :success
    assert_template 'new'

    assert_not_nil assigns(:classified)
  end

  def test_create
    num_classifieds = Classified.count

    post :create, :classified => {}

    assert_response :redirect
    assert_redirected_to :action => 'list'

    assert_equal num_classifieds + 1, Classified.count
  end

  def test_edit
    get :edit, :id => 1

    assert_response :success
    assert_template 'edit'

    assert_not_nil assigns(:classified)
    assert assigns(:classified).valid?
  end

  def test_update
    post :update, :id => 1
    assert_response :redirect
    assert_redirected_to :action => 'show', :id => 1
  end

  def test_destroy
    assert_not_nil Classified.find(1)

    post :destroy, :id => 1
    assert_response :redirect
    assert_redirected_to :action => 'list'

    assert_raise(ActiveRecord::RecordNotFound) {
      Classified.find(1)
    }
  end
end
