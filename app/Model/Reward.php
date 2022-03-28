<?php

App::uses('AppModel', 'Model');

class Reward extends AppModel {
    
    public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Поле "Title" обязательно к заполнению'
            )
        ),
        'description' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Поле "Description почта" обязательно к заполнению'
            )
        )
    );
    
    public $hasMany = 'UsersReward';
}

?>