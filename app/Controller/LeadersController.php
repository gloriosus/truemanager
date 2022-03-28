<?php

App::uses('AppController', 'Controller');

class LeadersController extends AppController {
    
    public $uses = array('User', 'Reward', 'UsersReward');
    
    public function index($page = 1) {
        $this->layout = 'oceanblue';
        
        $rows = $this->User->find('count');
        
        if($rows % 10 != 0) {
            $totalpages = (($rows - ($rows % 10)) / 10) + 1;
        }
        else {
            $totalpages = ($rows - ($rows % 10)) / 10;
        }
        
        if($page >= 1 && $page <= $totalpages) {
            $users = $this->User->find('all', array(
                'order' => array(
                    'User.score DESC'
                ),
                'limit' => 10,
                'offset' => ($page - 1) * 10
            ));
            $rewards = $this->Reward->find('all');
            $total = count($rewards);
            
            for($i = 0; $i < count($users); $i++){
                $arr = $this->UsersReward->find('all', array(
                    'conditions' => array(
                        'user_id' => $users[$i]['User']['id']
                    )
                ));
                
                $unlocked[$i] = count($arr);
            }

            $this->set(compact('users', 'total', 'page', 'totalpages', 'unlocked'));
        }
        else {
            throw new NotFoundException('Такой страницы не существует');
        }
    }
    
    public function a_redirect() {
        return $this->redirect('/leaders/page=1');
    }
    
}

?>