<?php

App::uses('AppController', 'Controller');

class GameController extends AppController {
    
    public $uses = array('User', 'Reward', 'UsersReward');
    
    public function index() {
        $this->layout = 'oceanblue';
        
        $user = $this->Auth->user();
        $total = $this->Reward->find('count');
        
        $preunlocked = $this->UsersReward->find('all', array(
            'conditions' => array(
                'UsersReward.user_id' => $this->Auth->user('id')
            )
        ));
        
        $unlocked = count($preunlocked);
        
        $this->set(compact('user', 'unlocked', 'total'));
    }
    
    public function rewards() {
        $this->layout = 'oceanblue';
        
        $preunlocked = $this->UsersReward->find('all', array(
            'conditions' => array(
                'UsersReward.user_id' => $this->Auth->user('id')
            )
        ));
        
        $line = '';
        
        foreach($preunlocked as $pre){
            $line = $line . '/' . $pre['Reward']['id'];
        }
        
        $rewards = $this->Reward->find('all');
        $unlocked = explode('/', $line);
        
        $this->set(compact('rewards', 'unlocked'));
    }
    
    public function play() {
        $this->layout = 'oceanblue';
    }
    
}

?>