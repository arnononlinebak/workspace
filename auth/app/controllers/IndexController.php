<?php

class IndexController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$this->assets->addCss('css/style.css');
    }

}

