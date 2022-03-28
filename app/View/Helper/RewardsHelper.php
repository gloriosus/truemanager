<?php

App::uses('AppHelper', 'View/Helper');

class RewardsHelper extends AppHelper {
    
    public $uses = array('User', 'Reward', 'UsersReward');
    
    public function getCount($user_id) {
        
        $preunlocked = $this->UsersReward->find('all', array(
            'conditions' => array(
                'UsersReward.user_id' => $user_id
            )
        ));
        
        $unlocked = count($preunlocked);
        
        return $unlocked;
    }
}

?>