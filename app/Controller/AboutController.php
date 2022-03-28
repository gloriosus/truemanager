<?php

App::uses('AppController', 'Controller');

class AboutController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
    
    public function index() {
        $this->layout = 'oceanblue';
    }
    
}

?>