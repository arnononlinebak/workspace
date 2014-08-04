<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class RegisterController extends ControllerBase
{

    public function indexAction()
    {

        
        $this->assets->addCss('css/style.css');
        $this->persistent->parameters = null;
    }

    public function createAction()
    {
        $this->assets->addCss('css/style.css');

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "register",
                "action" => "index"
            ));
        }

        $user = new Users();

        $user->username = $this->request->getPost("username");
        $user->fname = $this->request->getPost("fname");
        $user->lname = $this->request->getPost("lname");
        $user->email = $this->request->getPost("email", "email");
        $user->date = $this->request->getPost("date");
        

        if (!$user->save()) {
            foreach ($user->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "register",
                "action" => "new"
            ));
        }

        $this->flash->success("user was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "register",
            "action" => "index"
        ));

    }
    public function newAction()
    {
        $this->assets->addCss('css/style.css');

    }
}

