<?php

App::uses('AppModel', 'Model');

class UsersReward extends AppModel {
    
    public $belongsTo = array('User', 'Reward');
    
}

?>