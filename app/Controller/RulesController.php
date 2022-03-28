<?php

App::uses('AppController', 'Controller');

class RulesController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
    
    public function index() {
        $this->layout = 'oceanblue';
    }
    
}

?>