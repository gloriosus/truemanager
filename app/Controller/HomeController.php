<?php

App::uses('AppController', 'Controller');

class HomeController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'a_redirect');
    }
    
    public function index() {
        $this->layout = 'oceanblue';
    }
    
    public function a_redirect() {
        return $this->redirect('/home');
    }
    
}

?>